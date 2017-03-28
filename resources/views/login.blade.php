
<!DOCTYPE html>
<html>
    <head>
        <title>Calender</title>
       <link rel="stylesheet" href="public/css/bootstrap.min.css"/>
     
    </head>
    <body>
<div class="container-fluid">
	<div class="row"><div class="col-md-2 col-md-offset-1"></div>
		<div class="col-md-5">
			<h3 class="text-center text-primary">
				Login
			</h3>
			  @include('errors.error')
			  
			<form role="form" action="{{ asset('/') }}dologin" method="POST">
			 {!!csrf_field() !!}
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Email 
					</label>
					<input class="form-control" name="Email" type="text" />
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Password
					</label>
					<input class="form-control" name="Password" type="password" />
				</div>
				
				
				<button type="submit" class="btn btn-danger">Login</button>
                </form> 
			
		</div>
	</div>
</div>
 </div>
        <script src="public/js/jquery.min.js" type="text/javascript"></script>
      
    </body>
</html>
