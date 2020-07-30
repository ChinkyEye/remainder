@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<a class="nav-link text-primary" href="{{URL::to('/')}}/home"><i class="fas fa-backward"> Back</i></a>
	</div>
	<div class="card-body">
		<!-- <form action="{{URL::to('/')}}/home/client/search" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q" id="q" 
				placeholder="Search users"> <span class="input-group-btn">
					<button type="submit" class="btn btn-primary">
						Search
					</button>
				</span>
			</div>
		</form> -->
		<div class="input-group">
            <input type="text" class="form-control" name="search" id="search" 
            placeholder="Search users"> <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">
                Search
              </button>
            </span>
          </div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead class="bg-secondary">
							<tr>
								<th>SN</th>
								<th>Name</th>
								<th>Meeting Date</th>
								<th>Priority</th>
							</tr>
						</thead>
						<tbody>
							@foreach($clients as $key => $client)
							@php
							foreach($client->getScheduleCountLatest()->get() as $viewdata)
							{
								$meetingdate=$viewdata->a_date;
							}
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
							<tr>
								<td>{{$key + 1}}</td>
								<td>{{$client->c_name}}</td>
								@if($counts > 0)
								<td>{{$meetingdate}} </td>
								@else
								<td></td>
								@endif
								<td><i class="fas fa-square {{$client->priority == '1'? 'text-danger': ($client->priority == '2'? 'text-warning' : 'text-success') }}"></i> {{$display}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

 fetch_client_data();

 function fetch_client_data(query = '')
 {
  $.ajax({
   url:"{{ route('client-live') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_client_data(query);
 });
});
</script>
@endsection('content')