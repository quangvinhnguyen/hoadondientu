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
        
        $khachhang->save();
    }
    Session::flash('flash_success','Thêm thành công.');
    return redirect()->route('thanks');
    }
}
