@extends('layouts.app')
@section('content')
<!-- Main content -->
@foreach($datas as $client)
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle"
							src="{{URL::to('/')}}/images/person.jpg" id="blah" 
							alt="User profile picture" onclick="document.getElementById('imgInp').click();" >
							<input type='file' class="d-none" id="imgInp" />
						</div>
						<h3 class="profile-username text-center">{{$client->c_name}}</h3>

						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>Address</b> <a class="float-right">{{$client->c_address}}</a>
							</li>
							<li class="list-group-item">
								<b>Contact No</b> <a class="float-right">{{$client->c_phone}}</a>
							</li>
							<li class="list-group-item">
								<b>Mediator</b> <a class="float-right">{{$client->mediator}}</a>
							</li>
							<li class="list-group-item">
								<a href="{{URL::to('/')}}/home/client/{{$client->id}}/update" class="btn btn-xs {{$client->is_approve == '0' ? 'btn-danger' : 'btn-success'}}"><i class="fas fa-check"></i></a>
								@php
								if($client->priority == '1'){
									$display="High";
								}
								elseif($client->priority == '2'){
									$display="Medium";
								}
								else{
									$display="Low";
								}
								@endphp
								<a href="" style="float: right;"><i class="fas fa-square {{$client->priority == '1'? 'text-danger': ($client->priority == '2'? 'text-warning' : 'text-success') }}">{{$display}}</i></a>
							</li>
						</ul>
						<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

				<!-- About Me Box -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">About Mediator</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<strong><i class="fas fa-user-tie mr-1"></i>Name</strong>

						<p class="text-muted">
							{{$client->mediator}}
						</p>
						<hr>
						<strong><i class="fas fa-phone-volume mr-1"></i>Number</strong>
						<p class="text-muted">{{$client->p_number}}</p>
						<hr>
						<strong><i class="fas fa-envelope mr-1"></i> Email</strong>
						<p class="text-muted">
							{{$client->p_email}}
						</p>
						<hr>
						<strong><i class="far fa-file-alt mr-1"></i> Post</strong>
						<p class="text-muted">{{$client->p_designation}}</p>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- Action -->
				<div class="card card-primary">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 text-center">
								<a href="{{URL::to('/')}}/home/client/{{$client->id}}/edit"><i class="fas fa-edit"></i></a>
							</div>
							@if($counts == 0)
							<div class="col-md-6 text-center">
								<a href="{{URL::to('/')}}/home/client/{{$client->id}}/delete" ><i class="fa fa-trash"></i></a>
							</div>
							@endif
						</div>
					</div>
				</div>
				<!-- /Action -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link text-primary" href="{{URL::to('/')}}/home/client"><i class="fas fa-backward"> Back</i></a></li>
							<li class="nav-item ml-auto"><a class="nav-link text-primary" href="{{URL::to('/')}}/home/notification/{{$client->id}}/detail"><i class="far fa-edit">Add New Schedule</i></a></li>
						</ul>
					</div><!-- /.card-header -->
					@if($counts > 0)
					<div class="card-body">
						@php
						foreach($client->getScheduleCountLatest()->get() as $data){
						$date=$data->a_date;
						$detail=$data->result;
						$count_days = now()->diffInDays(Carbon\Carbon::parse($data->en_date), false);
					}
					@endphp
						<!-- Post -->
						<div class="post clearfix">
							<div class="user-block">
								<img class="img-circle img-bordered-sm" src="{{URL::to('/')}}/images/person2.jpg" alt="User Image">
								<span class="username">
									<a href="#">{{$client->c_name}}</a>
								</span>
								<span class="description">{{$client->c_address}} - {{$date}} | {{$count_days}} Days</span>
							</div>
							<!-- /.user-block -->
							<p class="text-center">
								{{$detail}}			
							</p>
						</div>
						<!-- /.post -->
					</div>
					@endif
					<div class="card-footer">
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>SN</th>
											<th>Conclusion</th>
											<th>Schedule</th>
											<!-- <th class="text-center">Action</th> -->
										</tr>
									</thead>
									<tbody>
										@foreach($notifications as $key => $notification)
										<tr>
											<td>{{$key+ 1}}</td>
											<td>{{$notification->result}}</td>
											<td>{{$notification->a_date}} | {{$notification->a_time}}</td>
											<!-- <td class="text-center"><a href="" ><i class="fa fa-trash"></i></a></td> -->
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
	</div><!-- /.container-fluid -->
</section>
@endforeach
@endsection