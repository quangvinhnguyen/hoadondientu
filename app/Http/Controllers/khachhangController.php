<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\khachhang;
use Auth;
use Validator;
use Session;
class khachhangController extends Controller
{
    public function getinfo(){
        $khachhangs = khachhang::all();
        dd($khachhangs);
    }

    public function getRegister()
    {
    return view('news.pages.khachhang.register');
    }
    public function vanbanAdd(Request $request)
    {
    $rules= [
            'sokh'=>'required',
            'trichyeunoidung' =>'required',
            'ngaybanhanh'=> 'required',
            'hinhthucvanban'=> 'required',
            'coquanbanhanh'=> 'required',
            'nguoikyduyet'=> 'required',
            ];
    $msg = [
            'sokh.required'=>'Không được bỏ trống Số ký hiệu.',
            'trichyeunoidung.required'=>'Không được bỏ trống Trích yếu nội dung.',
            'ngaybanhanh.required'=>'Không được bỏ trống Ngày ban hành.',
            'hinhthucvanban.required'=>'Không được bỏ trống Hình thức văn bản.',
            'coquanbanhanh.required'=>'Không được bỏ trống Cơ quan ban hành.',
            'nguoikyduyet.required'=>'Không được bỏ trống Người ký duyệt.',
            ];
    $validator = Validator::make($request->all(), $rules , $msg);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    } else {
        $vanban = new vanban();
        $vanban->sokh = $request->input('sokh');
        $vanban->trichyeunoidung = $request->input('trichyeunoidung');
        $vanban->ngaybanhanh = $request->input('ngaybanhanh');
        $vanban->hinhthucvanban = $request->input('hinhthucvanban');
        $vanban->coquanbanhanh = $request->input('coquanbanhanh');
        $vanban->nguoikyduyet = $request->input('nguoikyduyet');
        //Upload file
        if($request->hasFile('tailieu')){
            $file = $request->file('tailieu');
            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/vanbans/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name;
            }
            $file->move('upload/vanbans',$random_file_name);
            $vanban->tailieu = 'upload/vanbans/'.$random_file_name;
        } else $vanban->tailieu='';
        $vanban->save();
    }
    Session::flash('flash_success','Thêm thành công.');
    return redirect()->route('list-vanban');
    }
}
