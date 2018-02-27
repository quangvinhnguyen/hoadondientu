<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vanban;
use App\File;
use Auth;
use Validator;
use Session;
class vanbanController extends Controller
{
    public function getdata(){

        $vanban = vanban::all();
        dd($vanban);
    }
    public function getList()
    {
    	$vanbans = vanban::all();
        if(Auth::user()->role=='author'){
            $vanbans = $vanbans->where('user_id',Auth::user()->id);
        }
    	return view('admin.vanban.list',['vanbans'=>$vanbans]);
    }
    public function getAdd()
    {
    	return view('admin.vanban.add');
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
	    		$file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
	    		if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){
	    			$vanban->vanban_type = 'text';
	    		} else if($file_extension == 'mp4' || $file_extension == '3gp' || $file_extension == 'avi' || $file_extension == 'flv'){
	    			$vanban->vanban_type = 'video';
                } 
                // else return redirect()->back()->with('errfile','Chưa hỗ trợ định dạng file vừa upload.')->withInput();
                dd($file);
	    		$file_name = $file->getClientOriginalName();
	    		$random_file_name = str_random(4).'_'.$file_name;
	    		while(file_exists('upload/vanbans/'.$random_file_name)){
	    			$random_file_name = str_random(4).'_'.$file_name;
	    		}
                $file->move('upload/vanbans',$random_file_name);
              
	    		$file_upload = new File();
	    		$file_upload->name = $random_file_name;
	    		$file_upload->link = 'upload/vanbans/'.$random_file_name;
	    		$file_upload->vanban_id = $vanban->id;
	    		$file_upload->save();
	    		$vanban->tailieu = 'upload/vanbans/'.$random_file_name;
	    	} else $vanban->tailieu='';
	    	$vanban->save();
    	}
    	Session::flash('flash_success','Thêm thành công.');
    	return redirect()->route('list-vanban');
    }
    public function getUpdate($id)
    {
    	$vanban = vanban::find($id);
        if($vanban){
            if($vanban->user_id == Auth::user()->id){
                $cates = Category::all();
                $cates2 = array();
                foreach ($cates as $cate) {
                    $cates2[$cate->id] = $cate->name;
                }
                $tags = Tag::all();
                $tags2 = array();
                foreach ($tags as $tag) {
                    $tags2[$tag->id] = $tag->name;
                }
                return view('admin.vanban.edit',['vanban'=>$vanban,'cates'=>$cates2,'tags'=>$tags2]);
            } else {
                 Session::flash('flash_err','Bạn không có quyền thay đổi.');
                return redirect()->route('list-vanban');
            }
        }
    	else {
            Session::flash('flash_err','Sai Thông tin Bài Viết.');
            return redirect()->route('list-vanban');
        }
    	
    }

    public function vanbanUpdate(Request $request,$id)
    {
    	$vanban = vanban::find($id);
        if( $vanban ) {
            if($vanban->user_id == Auth::user()->id){
            	if($vanban->slug == $request->input('slug')){
                    $rules= [
                        'title'=>'required|min:3|max:100',
                        'des' =>'required|max:180',
                        'category_id'=> 'required| integer',
                        'content'=> 'required',
                    ];
                    $msg = [
                        'title.required'=>'Không được bỏ trống tiêu đề.',
                        'title.unique' => 'Tin này đã bị trùng, vui lòng nhập lại!',
                        'title.min'=>'Tên tin tức gồm ít nhất 3 ký tự!',
                        'title.max'=>'Tên tin tức gồm tối đa 100 ký tự!',
                        'des.required'=>'Không được bỏ trống tóm tắt.',
                        'content.required'=>'Không được bỏ trống nội dung',
                        'category_id.required'=> 'Không được bỏ trống chuyên mục.',
                        'category_id.integer'=> 'Chọn sai chuyên mục.',
                    ];
            	} else {
                	$rules= [
            			'title'=>'required|min:3|max:100',
            			'des' =>'required|max:180',
            			'category_id'=> 'required| integer',
            			'content'=> 'required',
            			'slug'=> 'required|unique:vanbans,slug|alpha_dash',
            		];
                	$msg = [
            			'title.required'=>'Không được bỏ trống tiêu đề.',
            			'title.unique' => 'Tin này đã bị trùng, vui lòng nhập lại!',
            			'title.min'=>'Tên tin tức gồm ít nhất 3 ký tự!',
            			'title.max'=>'Tên tin tức gồm tối đa 100 ký tự!',
            			'des.required'=>'Không được bỏ trống tóm tắt.',
            			'content.required'=>'Không được bỏ trống nội dung',
            			'category_id.required'=> 'Không được bỏ trống chuyên mục.',
            			'category_id.integer'=> 'Chọn sai chuyên mục.',
            			'slug.unique' => 'Url đã tồn tại, vui lòng nhập lại tiều đề!',
                        'slug.required'=> 'Không được bỏ trống url',
                        'slug.alpha_dash'=> 'Sai định dạng slug.',
            		];
                }
        		$validator = Validator::make($request->all(), $rules , $msg);

        		if ($validator->fails()) {
        		    return redirect()->back()
        		                ->withErrors($validator)
        		                ->withInput();
        		} else {
            		$vanban->title = $request->input('title');
        	    	$vanban->content = $request->input('content');
        	    	$vanban->description = $request->input('des');
        	    	$vanban->slug = $request->input('slug');
        	    	$vanban->user_id = Auth::user()->id;
        	    	$vanban->category_id = $request->input('category_id');
                    //Upload Image
                    if($request->hasFile('tailieu')){
                        ini_set('memory_limit','256M');
                        $file = $request->file('tailieu');
                        $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
                        if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){
                            $vanban->vanban_type = 'text';
                        } else if($file_extension == 'mp4' || $file_extension == '3gp' || $file_extension == 'avi' || $file_extension == 'flv'){
                            $vanban->vanban_type = 'video';
                        } else return redirect()->back()->with('errfile','Chưa hỗ trợ định dạng file vừa upload.')->withInput();

                        $file_name = $file->getClientOriginalName();
                        $random_file_name = str_random(4).'_'.$file_name;
                        while(file_exists('upload/vanbans/'.$random_file_name)){
                            $random_file_name = str_random(4).'_'.$file_name;
                        }
                        $file->move('upload/vanbans',$random_file_name);
                        // $file_upload = new File();
                        // $file_upload->name = $random_file_name;
                        // $file_upload->vanban_id = $vanban->id;
                        // $file_upload->save();
                        $vanban->feture = 'upload/vanbans/'.$random_file_name;
                    }

                    $vanban->save();

        	    	if($request->input('tags')){
        	    		$vanban->tags()->sync( $request->input('tags') );
        	    	} else {
        	    		$vanban->tags()->sync( array() );
        	    	}
        	    	Session::flash('flash_success','Thay đổi thành công.');
            		return redirect()->route('list-vanban');
                }
            } else {
                    Session::flash('flash_err','Bạn không có quyền thay đổi.');
                    return redirect()->route('list-vanban');
                }
        } else {
            Session::flash('flash_err','Sai thông tin bài viết.');
            return redirect()->route('list-vanban');
        }
    }
    	
    public function getDelete($id)
    {
    	$vanban = vanban::find($id);
	    	if( $vanban ){
                if( $vanban->user_id == Auth::user()->id || Auth::user()->role == 'admin' ){
                    $vanban->tags()->detach();
                    $vanban->delete();
                    Session::flash('flash_success','Xóa thành công.');
                    return redirect()->route('list-vanban');
                } else {
                    Session::flash('flash_err','Bạn không có quyền xóa bài.');
                    return redirect()->route('list-vanban');
                }
	    	} else {
	    		Session::flash('flash_err','Bài viết không tồn tại.');
	    	}
	    	return redirect()->route('list-vanban');
    }
    public function updateStatus(Request $request)
    {
        if($request->ajax()){
            $vanban = vanban::find($request->input('id'));
            if( $vanban ){
                if( Auth::user()->role == 'admin' ){
                    if($request->input('status')== 0 || $request->input('status')==1 ){
                        $vanban->status =$request->input('status');
                        $vanban->save();
                        return 'ok';
                    } else { return 'Sai trạng thái.';}
                } else { return 'Bạn không đủ quyền'; }
            } else { return 'Bài viết không tồn tại.'; }
        }
    }
}
