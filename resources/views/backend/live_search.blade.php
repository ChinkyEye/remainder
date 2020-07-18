@extends('layouts.app')
@section('content')
    <div class="card">
      <div class="card-header">
        <a class="nav-link text-primary" href="{{URL::to('/')}}/home"><i class="fas fa-backward"> Back</i></a>
      </div>
        <div class="card-body">
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
                <table class="table table-striped table-hover table-bordered">
                  <thead class="bg-secondary">                  
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Meeting Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    
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

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
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
  fetch_customer_data(query);
 });
});
</script>
@endsection