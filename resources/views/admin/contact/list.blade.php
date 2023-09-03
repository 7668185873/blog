@extends('admin/layout.layout')

@section('page_title','Contact Listing')

@section('container')
		

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Contact</h4>
			<!-- <h2><a href="/admin/page/add">Add Page</a></h2> -->
			<!-- {{session('msg')}} -->
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
									<th width="15%">Name</th>
									<th width="15%">Email</th>
									<th width="10%">Mobile</th>
									<th width="48%">Message</th>
									<th width="10%">Add-On</th>
								 </tr>
							  </thead>
							  <tbody>
							  	@foreach($result as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->name}}</td>
									<td>{{$list->email}}</td>
									<td>{{$list->mobile}}</td>
									<td>{{$list->message}}</td>
									<td>{{$list->added_on}}</td>
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
