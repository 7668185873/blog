@extends('admin/layout.layout')

@section('page_title','Post Listing')

@section('container')
		

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<h2><a href="/admin/post/add">Add Post</a></h2>
			{{session('msg')}}
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th width="2%">Id</th>
									<th width="55%">Title</th>
									<!-- <th width="15%">Short Desc</th> -->
									<th width="10%">Image</th>
									<th width="10%">Date</th>
									<th width="18%">Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  	@foreach($result as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->title}}</td>
									<!-- <td>{{$list->short_desc}}</td> -->
									<td><img src="{{ asset('storage/posts_images/'.$list->image)}}" width="100px;" /></td>
									<td>{{$list->blog_date}}</td>
									<td>
										<a href="{{url('admin/post/edit/'.$list->id)}}" class="btn btn-info color_whit ">Edit</a>
										<a href="{{url('admin/post/delete/'.$list->id)}}" class="btn btn-danger color_white">Delete</a>
									</td>
								 </tr>
								 @endforeach
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>

@endsection
