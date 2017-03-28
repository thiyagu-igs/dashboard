<!DOCTYPE html>
<html>
    <head>
        <title>Calender</title>
       <link rel="stylesheet" href="public/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="public/css/fullcalendar.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
            <h2>Bookings</h2>
             <div id="calendar" class="col-sm-offset-1 col-sm-10"></div> 
            </div>
        </div>
        <script src="public/js/jquery.min.js" type="text/javascript"></script>
        <script src="public/js/moment.min.js" type="text/javascript"></script>
         <script src="public/js/fullcalendar.min.js" type="text/javascript"></script>
        
        <script type="text/javascript">
		$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,listWeek'
			},	
			firstDay:1,
			fixedWeekCount :false,		
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: "{{ asset('/') }}eventview",
				error: function() {
					$('#script-warning').show();
				}
			}
		});
		
	});
		</script>
    </body>
</html>
