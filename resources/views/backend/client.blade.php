@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Add Information
				</button>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content bg-info">
						<div class="modal-header">
							<h4 class="modal-title">ADD DETAIL</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							</div>
							<form role="form" method="POST" action="{{URL::to('/')}}/home/client/store">
								<div class="modal-body">
									{{csrf_field()}}
									<div class="form-group">
										<label for="client">Client</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-users" style="font-size: 12px"></i></span>
											</div>
											<input type="text" name="c_name" class="form-control" id="client" placeholder="Enter Company Name" autocomplete="off">
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="address">Address</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-map-marker-alt" style="font-size: 20px;"></i></span>
													</div>
													<input type="text" name="c_address" class="form-control" id="address" placeholder="Enter Company address" autocomplete="off">
												</div>
											</div>
											<div class="col-md-6">
												<label for="address">Phone</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-phone"></i></span>
													</div>
													<input type="text" name="c_phone" class="form-control" id="address" placeholder="Enter Company Contact" maxlength="15" autocomplete="off">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="c_description">Client's Point Of View:</label>
										<textarea id="c_description" name="c_description" rows="5" cols="33" class="form-control" autocomplete="off"></textarea>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="mediator">Mediator:</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-user"></i></span>
													</div>
													<input type="text" name="mediator" class="form-control" id="mediator" placeholder="Enter mediator name" autocomplete="off">
												</div>
											</div>
											<div class="col-md-6">
												<label for="m_phone">Phone No:</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-phone"></i></span>
													</div>
													<input type="text" name="m_phone" class="form-control" id="m_phone" placeholder="Enter mediator no." maxlength="15" autocomplete="off">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class='col-md-6'>
												<div class="form-group">
													<label>First Meeting Date</label>
													<div class='input-group' >
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
														</div>
														<input type='text' name="firstmeet_date" class="form-control" id="datepicker" autocomplete="off" />
														<input type="hidden" class="form-control" name="en_firstmeet_date" id="englishDate1" readonly="true">
													</div>
												</div>
											</div>
											<div class='col-md-6'>
													<label>Next Meeting Date</label>
													<div class='input-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
														</div>
														<input type='text' name="nextmeet_date" class="form-control" id="nepaliDate" autocomplete="off"/>
														<input type="hidden" class="form-control" name="en_nextmeet_date" id="englishDate" readonly="true">
													</div>
											</div>
										</div>	
									</div>

									<div class="form-group">
										<label for="detail">Person Contact</label>
										<div class="row">
											<div class="col-md-3">
												<div class='input-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-user"></i></span>
													</div>
													<input type='text' placeholder='Enter Name' id='name_1' name="p_name" class='form-control' autocomplete="off">
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-phone-volume" style="font-size: 17px;"></i></span>
													</div>
													<input type='text' placeholder='+977' id='phone_1' name="p_number" class='form-control' autocomplete="off">
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-envelope" style="font-size: 13px;"></i></span>
													</div>
													<input type='text' placeholder='@gmail.com' id='email_1' name="p_email" class="form-control" autocomplete="off">
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" ><i class="fas fa-user-tie" style="font-size: 15px;"></i></span>
													</div>
													<input type='text' placeholder='Enter Post' id='email_1' name="p_designation" class="form-control" autocomplete="off" >
												</div>
											</div>
										</div>
										<!-- <label for="detail">Person Contact</label>
										<div class='input-group col-md-12' value="1">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user-tie mr-1"></i></span>
											</div>
											<input type='text' placeholder='Enter Name' id='name_1' name="p_name" class='txt form-control col-md-3' autocomplete="off">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-phone-volume mr-1"></i></span>
											</div>
											<input type='text' placeholder='+977' id='phone_1' name="p_number" class='txt form-control col-md-3' autocomplete="off">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope mr-1"></i></span>
											</div>
											<input type='text' placeholder='@gmail.com' id='email_1' name="p_email" class="txt form-control col-md-3" autocomplete="off">
											<div class="input-group-prepend">
												<span class="input-group-text">P</span>
											</div>
											<input type='text' placeholder='Enter Post' id='email_1' name="p_designation" class="txt form-control col-md-3" autocomplete="off" >				
										</div> -->
									</div>
									<div class="form-group">
									<!-- <div class='input-group col-md-12'>
										<input type="checkbox"  name="checkbox" value="1">High<br/>  
										<input type="checkbox" name="checkbox" value="2">Low<br/>  
										<input type="checkbox" name="checkbox" value="3">Medium<br/> 
									</div> -->
									<label>Priority</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="checkbox" value="1">
										<label class="form-check-label">High</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="checkbox" value="2">
										<label class="form-check-label">Medium</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="checkbox" value="3">
										<label class="form-check-label">Low</label>
									</div> 
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-outline-light">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered">
								<thead class="bg-secondary">                  
									<tr>
										<th>SN</th>
										<th>Client</th>
										<th>Address</th>
										<th>Contact No</th>
										<th>Mediator</th>
										<th>Next Schedule</th>
										<th>Remaining Days</th>
										<th>Added By</th>
										<!-- <th>Deal Status</th> -->
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($clients as $key =>$client)
									@php
									foreach($client->getScheduleCountLatest()->get() as $data)
									{
										$date = $data->a_date;
										$count_days = now()->diffInDays(Carbon\Carbon::parse($data->en_date) -> toDateString(), false);

									}
									@endphp
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$client->c_name}}</td>
										<td>{{$client->c_address}}</td>
										<td>{{$client->c_phone}}</td>
										<td>{{$client->mediator}}</td>
										@if($counts > 0)
										<td>
											{{$date}}
										</td>
										<td>{{$count_days}} Days</td>
										@else
										<td></td>
										<td></td>
										@endif

										<td>{{$client->user->name}}</td>
										<td>
											<div>
												<a href="{{URL::to('/')}}/home/client/{{$client->id}}/show"><i class="fa fa-eye"></i></a>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
							{{$clients->links("pagination::bootstrap-4") }}
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
	
@endsection('content')
