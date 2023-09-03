<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Post extends Controller
{
    function listing(){

    		$data['result']=DB::table('posts')->orderBy('id','desc')->get();
    		return view('/admin/post/list',$data);

    }

    function submit(Request $request){


    	$request->validate([

    		'title'=>'required',
    		'short_desc'=>'required',
    		'long_desc'=>'required',
    		'image'=>'required|mimes:jpg,jpeg,png',
    		'blog_date'=>'required',

    	]);


    		// $image=$request->file('image')->store('public/posts_images');
    		$image=$request->file('image');
    		$ext=$image->extension();
    		$file=time().'.'.$ext;
    		 $image->storeAs('public/posts_images',$file);

    		// echo "<pre>";
    		// print_r($image_path);
    		// die();

    	 $data=array(

    	 	'title'=>$request->input('title'),
    	 	'short_desc'=>$request->input('short_desc'),
    	 	'long_desc'=>$request->input('long_desc'),
    	 	'image'=>$file,
    	 	'blog_date'=>$request->input('blog_date'),
    	 	'status'=>1,
    	 	'added_on'=>date('Y-m-d h:i:s')
    	 );

    	 // echo "<pre>";
    	 // print_r($data);
    	 // die();

    	 DB::table('posts')->insert($data);
    	 $request->session()->flash('msg','Post Saved Successfully');
    	 return redirect('admin/post/list');
    }

    function post_delete(Request $request,$id){

    	DB::table('posts')->where('id',$id)->delete();
    	$request->session()->flash('msg','Post Delete Successfully');
    	return redirect('admin/post/list'); 	
    }

    function edit($id){

    	 $data['result']=DB::table('posts')->where('id',$id)->get();
    	 return view('admin/post/edit',$data);
    }

    function update(Request $request,$id){

    		$request->validate([

    		'title'=>'required',
    		'short_desc'=>'required',
    		'long_desc'=>'required',
    		'image'=>'mimes:jpg,jpeg,png',
    		'blog_date'=>'required',

    	]);


    		// $image=$request->file('image')->store('public/posts_images');
    		

    	 $data=array(

    	 	'title'=>$request->input('title'),
    	 	'short_desc'=>$request->input('short_desc'),
    	 	'long_desc'=>$request->input('long_desc'),
    	 	// 'image'=>$file,
    	 	'blog_date'=>$request->input('blog_date'),
    	 	'status'=>1,
    	 	'added_on'=>date('Y-m-d h:i:s')
    	 );
    	 if($request->hasfile('image')) {
    	 	
    	 	$image=$request->file('image');
    		$ext=$image->extension();
    		$file=time().'.'.$ext;
    		$image->storeAs('public/posts_images',$file);
    		$data['image']=$file;

    	 }

    	 // echo "<pre>";
    	 // print_r($data);
    	 // die();

    	 DB::table('posts')->where('id',$id)->update($data);
    	 $request->session()->flash('msg','Post Updated Successfully');
    	 return redirect('admin/post/list');

    }
}
