@extends('layouts.app')
@section('content')
<div class="card">
	<form method="POST" action="{{URL::to('/')}}/home/notification/store">
		<div class="card-header">
			<a class="nav-link text-primary" href="{{URL::previous()}}"><i class="fas fa-backward"> Back</i></a>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					{{csrf_field()}}
					<div>
					<input type="hidden" name="client_id" value="{{$main_id}}">
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="result">Conclusion</label>
							<textarea id="result" name="result" rows="1" class="form-control" autocomplete="off"></textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="a_date">Schedule Date</label>
							<input type="text" name="a_date" class="form-control" id="datepicker" autocomplete="off">
							<input type="hidden" class="form-control" name="en_date" id="englishDate1" readonly="true">
						</div>
						<div class="form-group col-md-4">
							<label for="a_time">Schedule Time</label>
							<input type="time" name="a_time" class="form-control" autocomplete="off">
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-success" value="Submit">
		</div>
	</form>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hover class-bordered">
						<thead class="bg-secondary">
							<tr>
								<td>SN</td>
								<td>Detail</td>
								<td>Schedule</td>
								<td>Remaining Days</td>
								<td>Updated By</td>
								<td>Created At</td>
								<td>Updated At</td>
								<td style="width: 20px" class="text-center">Action</td>
							</tr>
						</thead>
						@foreach($notifications as $key=> $notification)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$notification->result}}</td>
							<td>{{$notification->a_date}}</td>
							<td>{{Carbon\Carbon::parse($notification->en_date)->diffInDays()}} Days</td>
							<td>{{$notification->user->name}}</td>
							<td>{{$notification->created_at}}</td>
							<td>{{$notification->updated_at}}</td>
							<td class="text-center">
								<a href="{{URL::to('/')}}/home/notification/{{$notification->id}}/delete" ><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</table>

				</div>
			</div>
		</div>
	</div> 

</div>
@endsection