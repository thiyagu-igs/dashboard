@extends('layouts.admin')

@section('content')
 <div class="row"> 
<h2>Change password</h2>
 @include('errors.error')
			  
    <form role="form" action="{{ asset('/') }}admin/updatepass" method="POST">
     {!!csrf_field() !!}
        <div class="form-group">					 
            <label for="oldpass">Old Password</label> 				
            
            <input class="form-control" name="oldpass" type="password" />
        </div>
        <div class="form-group">					 
            <label for="pass">New Password	</label>					
        
            <input class="form-control" name="pass" type="password" />
        </div>
        <div class="form-group">					 
            <label for="pass_confirmation">Retype Password	</label>					
        
            <input class="form-control" name="pass_confirmation" type="password" />
        </div>
        <button type="submit" class="btn btn-danger">Update</button>
    </form> 
</div>
@endsection