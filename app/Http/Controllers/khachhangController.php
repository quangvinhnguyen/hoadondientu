<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\khachhang;
use Auth;
use Validator;
use Session;
use Mail;
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
    public function register(Request $request)
    {
    $rules= [
            'mast'=>'required|max:10',
            'tendv' =>'required|max:180',
            'dcdkkd'=> 'required|max:300',
            'nguoilienhe'=> 'required|max:180',
            'email'=> 'required|email',
            'dtdd'=> 'required',
            ];
    $msg = [
            'mast.required'=>'Không được bỏ trống mã số thuế gồm 10 số.',
            'tendv.required'=>'Không được bỏ trống tên đơn vị.',
            'dcdkkd.required'=>'Không được bỏ trống địa chỉ đăng ký kinh doanh.',
            'nguoilienhe.required'=>'Không được bỏ trống người liên hệ.',
            'email.required'=>'phải nhập đầy đủ đúng cú phap vd :example@gmail.com',
            'dtdd.required'=>'Đề nghị nhập số điện thoại.',
            ];
    $validator = Validator::make($request->all(), $rules , $msg);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    } else {
        $khachhang = new khachhang();
        $khachhang->mast = $request->input('mast');
        $khachhang->tendv = $request->input('tendv');
        $khachhang->dcdkkd = $request->input('dcdkkd');
        $khachhang->nguoilienhe = $request->input('nguoilienhe');
        $khachhang->email = $request->input('email');
        $khachhang->dtdd = $request->input('dtdd');
        //Upload file
        if($request->hasFile('tailieu')){
            $file = $request->file('tailieu');
            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/khachhangs/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name;
            }
            $file->move('upload/khachhangs',$random_file_name);
            $khachhang->tailieu = 'upload/khachhangs/'.$random_file_name;
        } ;
        $khachhang->save();
    }
    Session::flash('flash_success','Thêm thành công.');
    return redirect()->route('thanks');
    }
    
    public function getList()
    {
        $khachhangs = khachhang::all();
        if(Auth::user()->role=='author'){
            $khachhangs = $khachhangs->where('user_id',Auth::user()->id);
        }
        return view('admin.khachhang.list',['khachhangs'=>$khachhangs]);
    }
   
    public function getUpdate($id)
    {
        $khachhang = khachhang::find($id);
        if($khachhang){
                return view('admin.khachhang.edit',['khachhang'=>$khachhang]);
        }
        else {
            Session::flash('flash_err','Sai Thông tin Bài Viết.');
            return redirect()->route('list-khachhang');
        }
        
    }
    
    public function khachhangUpdate(Request $request,$id)
    {
        $khachhang = khachhang::find($id);
        if( $khachhang ) 
        {
            
            $rules= [
                'sokh'=>'required',
                'trichyeunoidung' =>'required',
                'ngaybanhanh'=> 'required',
                'hinhthuckhachhang'=> 'required',
                'coquanbanhanh'=> 'required',
                'nguoikyduyet'=> 'required',
                ];
        $msg = [
                'sokh.required'=>'Không được bỏ trống Số ký hiệu.',
                'trichyeunoidung.required'=>'Không được bỏ trống Trích yếu nội dung.',
                'ngaybanhanh.required'=>'Không được bỏ trống Ngày ban hành.',
                'hinhthuckhachhang.required'=>'Không được bỏ trống Hình thức văn bản.',
                'coquanbanhanh.required'=>'Không được bỏ trống Cơ quan ban hành.',
                'nguoikyduyet.required'=>'Không được bỏ trống Người ký duyệt.',
                ];
                $validator = Validator::make($request->all(), $rules , $msg);
    
                if ($validator->fails()) {
                    return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
                } 
                else
                {
                    $khachhang->sokh = $request->input('sokh');
                    $khachhang->trichyeunoidung = $request->input('trichyeunoidung');
                    $khachhang->ngaybanhanh = $request->input('ngaybanhanh');
                    $khachhang->hinhthuckhachhang = $request->input('hinhthuckhachhang');
                    $khachhang->coquanbanhanh = $request->input('coquanbanhanh');
                    $khachhang->nguoikyduyet = $request->input('nguoikyduyet');
                    //Upload file
                        if($request->hasFile('tailieu')){
                            $file = $request->file('tailieu');
                            $file_name = $file->getClientOriginalName();
                            $random_file_name = str_random(4).'_'.$file_name;
                            while(file_exists('upload/khachhangs/'.$random_file_name)){
                                $random_file_name = str_random(4).'_'.$file_name;
                            }
                            $file->move('upload/khachhangs',$random_file_name);
                            $khachhang->tailieu = 'upload/khachhangs/'.$random_file_name;
                        } ;
                    $khachhang->save();
                    Session::flash('flash_success','Thay đổi thành công.');
                    return redirect()->route('list-khachhang');
                } 
                } 
                else{
            Session::flash('flash_err','Sai thông tin bài viết.');
            return redirect()->route('list-khachhang');
        }
    }
        
    public function getDelete($id)
    {
        $khachhang = khachhang::find($id);
            if( $khachhang ){
                if( Auth::user()->role == 'admin' ){
                    $khachhang->delete();
                    Session::flash('flash_success','Xóa thành công.');
                    return redirect()->route('list-khachhang');
    
            } else {
                Session::flash('flash_err','Bài viết không tồn tại.');
            }
            return redirect()->route('list-khachhang');
    }
    } 
}
