@extends('layouts.admin')
 <link rel="stylesheet" href="public/css/fullcalendar.min.css"/>
@section('content')
 <div class="row"> 
<h2>Welcome {{Session::get('username') }}</h2>
 <div id="fullview" class="content col-sm-11"></div> 
           </div>
<script src="public/js/moment.min.js" type="text/javascript"></script>
<script src="public/js/fullcalendar.min.js" type="text/javascript"></script>        
<script type="text/javascript">
	$(document).ready(function() {
		
		$('#fullview').fullCalendar({
			header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,listMonth'
			},	
			fixedWeekCount :false,
			selectable:true,
			select: function (start, end, jsEvent, view) {
				 window.location.href="{{ asset('/') }}admin/newbooking/?t_start="+start.format("MM/DD/YYYY")+"&t_end="+end.format("MM/DD/YYYY");
				$("#fullview").fullCalendar("unselect");
			},
			selectOverlap: function(event) {
				return ! event.block;
			}	,	
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: "{{ asset('/') }}eventview",
				error: function() {
					$('#script-warning').show();
				}
			},
			 eventClick: function(event) {
				 window.location.href="{{asset('/')}}admin/editbooking/"+event.id;
			 }
		});		
	});
		</script>
@endsection