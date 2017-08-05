@extends('layouts.admin')

@section('content')
 <div class="row"> 
<h2>Bookings</h2>
 @include('errors.error')
 <a href="{{asset('admin/newbooking')}}" class="btn">New booking</a>
        <form method="GET" action="{{asset('/admin/booking')}}">
        <div class="col-sm-4">
        <input type="text" class="form-control" name="name" placeholder="Enter name" /></div>
        <div class="col-sm-4">
        <input type="submit" class="btn btn-success" name="sub" value="Search"/></div>
        </form>
   <div class="content table-responsive table-full-width">
   <?php if(!empty($booking)){
	   ?>
        <table class="table table-hover table-striped">
            <thead>
               <tr><th>S.No</th>
                <th>Name</th>
                <th>Fillable</th>
                <th>Date</th>               
                <th>Booking date</th>
                <th>Action</th>
            </tr></thead>
            <tbody>@foreach($booking as $k=>$lop)
            <?php $curstart = $booking->currentPage()==1?0:($booking->currentPage()-1)*$booking->perPage(); ?>
            <tr><td>{{ $curstart+$k+1}}</td><td>{{$lop->BookName}}</td>
                <td>{{$lop->BookCount}}</td>
                <td>{{date('F d, Y', strtotime( $lop->BookDate))}}</td>
                <td>{{date('F d, Y', strtotime( $lop->BookCreatedDt))}}</td>                
                <td>
                <a href="{{asset('/admin/editbooking')}}/{{$lop->BookID}}" title="Edit booking"><i class="pe-7s-edit"></i></a>
                <a href="{{asset('/admin/viewbooking')}}/{{$lop->BookID}}" title="View booking"><i class="pe-7s-photo-gallery"></i></a>
                </td></tr>         
             @endforeach 
            </tbody>
        </table>
       <?php echo $booking->render(); ?>
        <?php }?>
    </div>
</div>
@endsection