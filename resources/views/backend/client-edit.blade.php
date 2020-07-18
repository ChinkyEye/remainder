@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			@foreach($clients as $key => $data)
			<form role="form" method="POST" action="{{URL::to('/')}}/home/client/{{$id}}/update2">
				<div class="modal-body">
					{{csrf_field()}}
					<div class="form-group">
						<label for="client">Client</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-users" style="font-size: 12px"></i></span>
							</div>
							<input type="text" name="c_name" class="form-control" id="client" placeholder="Enter Company Name" autocomplete="off" value="{{$data->c_name}}">
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
									<input type="text" name="c_address" class="form-control" id="address" placeholder="Enter Company address" autocomplete="off" value="{{$data->c_address}}">
								</div>
							</div>
							<div class="col-md-6">
								<label for="address">Phone</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-phone"></i></span>
									</div>
									<input type="text" name="c_phone" class="form-control" id="address" placeholder="Enter Company Contact" maxlength="15" autocomplete="off" value="{{$data->c_phone}}">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="c_description">Client's Point Of View:</label>
						<textarea id="c_description" name="c_description" rows="5" cols="33" class="form-control" autocomplete="off">{{$data->c_description}}</textarea>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="mediator">Mediator:</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<input type="text" name="mediator" class="form-control" id="mediator" placeholder="Enter mediator name" autocomplete="off" value="{{$data->mediator}}">
								</div>
							</div>
							<div class="col-md-6">
								<label for="m_phone">Phone No:</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-phone"></i></span>
									</div>
									<input type="text" name="m_phone" class="form-control" id="m_phone" placeholder="Enter mediator no." maxlength="15" autocomplete="off" value="{{$data->m_phone}}">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class='col'>
								<div class="form-group">
									<label>First Meeting Date</label>
									<div class='input-group' >
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
										</div>
										<input type='text' name="firstmeet_date" class="form-control" id="datepicker" autocomplete="off" value="{{$data->firstmeet_date}}" />
										<input type="hidden" class="form-control" name="en_firstmeet_date" id="englishDate1" readonly="true" value="$data->en_firstmeet_date">
									</div>
								</div>
							</div>
							<!-- <div class='col-md-6'>
								<label>Next Meeting Date</label>
								<div class='input-group'>
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
									</div>
									<input type='text' name="nextmeet_date" class="form-control" id="nepaliDate" autocomplete="off" value="{{$data->nextmeet_date}}" />
									<input type="hidden" class="form-control" name="en_nextmeet_date" id="englishDate" readonly="true" value="{{$data->en_nextmeet_date}}">
								</div>
							</div> -->
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
									<input type='text' placeholder='Enter Name' id='name_1' name="p_name" class='form-control' autocomplete="off" value="{{$data->p_name}}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-phone-volume" style="font-size: 17px;"></i></span>
									</div>
									<input type='text' placeholder='+977' id='phone_1' name="p_number" class='form-control' autocomplete="off" value="{{$data->p_number}}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-envelope" style="font-size: 13px;"></i></span>
									</div>
									<input type='text' placeholder='@gmail.com' id='email_1' name="p_email" class="form-control" autocomplete="off" value="{{$data->p_email}}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" ><i class="fas fa-user-tie" style="font-size: 15px;"></i></span>
									</div>
									<input type='text' placeholder='Enter Post' id='email_1' name="p_designation" class="form-control" autocomplete="off" value="{{$data->p_designation}}">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group" >
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
				<div class="card-footer">
					<input type="submit" class="btn btn-success" value="Update">
				</div>
			</form>
			@endforeach
		</div>
	</div>
</div>
	
@endsection('content')
