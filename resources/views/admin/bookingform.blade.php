@extends('layouts.admin')

@section('content')
 <div class="row"> 
<h2>{{isset($booking)?'Update': 'New '}} Booking</h2>
 @include('errors.error')
			 
    <form role="form" action="{{ asset('/') }}admin/{{isset($booking)?'edit': 'new'}}booking" method="POST" enctype="multipart/form-data">
     {!!csrf_field() !!}
        <div class="form-group">
        @if(isset($booking))
        <input type="hidden" name="pid" value="{{$booking->BookID}}" />
        @endif			 
            <label for="oldpass">Name</label> 				
            
            <input class="form-control" name="bname" type="text" value="{{$booking->BookName or ''}}" />
        </div>
        <div class="form-group">	
         <div class="col-sm-4">				 
            <label for="pass">Rooms</label>					
        
            <input class="form-control formnumeric" name="brooms" type="text" maxlength="2" value="{{$booking->BookCount or ''}}" />
  	</div> <div class="col-sm-4">							 
            <label for="pass_confirmation">Start Date	</label>					
        
            <input class="form-control datepicker" name="bsdate" type="text" value="{{isset($booking)?
            date('m/d/Y',strtotime($booking->BookDate)):''}}{{Request::get('t_start') }}" />
        	</div><div class="col-sm-4">						 
            <label for="pass_confirmation">End Date	</label>					
        
            <input class="form-control datepicker" name="bedate" type="text" value="{{isset($booking)&&$booking->BookEndDate!=''?
            date('m/d/Y',strtotime($booking->BookEndDate)):''}}{{Request::get('t_end') }}" />
        </div></div>
          <div class="form-group">					 
            <label for="pass_confirmation">Addditional details	</label>					
        
            <textarea class="form-control" name="bimg" >{{$booking->BookDetails or ''}}</textarea>
        </div>
        <button type="submit" class="btn btn-danger">{{isset($booking)?'Update': 'Save '}}</button>
    </form> 
</div>
<script type="text/javascript">
$(function(){
	$('.datepicker').datepicker();
});
</script>
@endsection