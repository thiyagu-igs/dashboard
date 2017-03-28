<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\User;
use App\Booking;
use Session;
class AdminController extends Controller {
	public function __construct(){
	
   }

   public function index(){
    return view('admin/dashboard');
   }
   public function changepass(){
    return view('admin/changepassword');
   }
   
   public function booking(){
	   $bookarr = Booking::orderBy('BookDate','desc')->paginate();
    return view('admin/booking',['booking'=>$bookarr]);
   }
   
   public function newbooking(){
	 
    return view('admin/bookingform');
   }
   
   public function savebooking(Request $request){
    $validator = Validator::make($request->all(), [
        'bname' => 'required',
		'brooms' => 'required|integer',
		'bsdate'=>'required|date',
		'bedate'=>'date|after:sdate'
    ]);
//set validation amd modify messages
	$niceNames = array(
		'bname' => 'Name',
		'brooms'=>'Rooms',
		'bsdate'=>'Start Date',
		'bedate'=>'End Date'
	);
	$validator->setAttributeNames($niceNames); 
    if ($validator->fails()) {
		
        return redirect('/admin/newbooking')
            ->withInput()
            ->withErrors($validator);
    }
	
	$booking = new Booking;
	$booking->BookName = $request->bname;
	$booking->BookCount = $request->brooms;
	$booking->BookDate = date('Y-m-d',strtotime($request->bsdate));
	$booking->BookEndDate = $request->bedate==''?$booking->BookDate: date('Y-m-d',strtotime($request->bedate));
	$booking->BookDetails = $request->bimg;
	$booking->save();
	 return redirect('admin/booking');
    
   }
   
   public function editbooking($id){
	 
    return view('admin/bookingform',['booking'=>Booking::find($id)]);
   }
   
   public function viewbooking($id){
	 
    return view('admin/bookingdetail',['booking'=>Booking::find($id)]);
   }
   
   public function updatebooking(Request $request){
    $validator = Validator::make($request->all(), [
        'bname' => 'required',
		'brooms' => 'required|integer',
		'bsdate'=>'required|date',
		'bedate'=>'date|after:sdate',
		'bimg'=>'min:10|max:500'
    ]);
//set validation amd modify messages
	$niceNames = array(
		'bname' => 'Name',
		'brooms'=>'Rooms',
		'bsdate'=>'Start Date',
		'bedate'=>'End Date',
		'bimg'=>'Additonal details'
	);
	$validator->setAttributeNames($niceNames); 
    if ($validator->fails()) {
		
        return redirect('/admin/editbooking/'.$request->pid)
            ->withInput()
            ->withErrors($validator);
    }
	
	$booking = Booking::find($request->pid);
	$booking->BookName = $request->bname;
	$booking->BookCount = $request->brooms;
	$booking->BookDate = date('Y-m-d',strtotime($request->bsdate));
	$booking->BookEndDate =  $request->bedate==''?$booking->BookDate:date('Y-m-d',strtotime($request->bedate));
	$booking->BookDetails = $request->bimg;
	/*if ($request->file('bimg')->isValid()) {
		
		$fname = $request->file('bimg');
		
		$request->file('bimg')->move('public/user',$fname);
		$booking->BookDetails = $fname;
	}*/
	
	$booking->save()>0?$request->session()->flash('fl_message', 'Booking updated successfully'):$request->session()->flash('fl_message', 'Error occured');
	 return redirect('admin/booking');
    
   }
   
    public function updatepass(Request $request){
    $validator = Validator::make($request->all(), [
        'oldpass' => 'required|min:6',
		'pass' => 'required|min:6|confirmed'
		
    ]);
//set validation amd modify messages
	$niceNames = array(
		'oldpass' => 'Old Password',
		'pass'=>'New password'
		
	);
	$validator->setAttributeNames($niceNames); 
    if ($validator->fails()) {
		
        return redirect('/admin/changepass')
            ->withInput()
            ->withErrors($validator);
    }
	
	$resp = User::validatelogin($request->session()->get('usermail'),$request->oldpass);
	
		
	
	if(empty($resp))
		$request->session()->flash('fl_message', 'Enter valid Old Password');
	else{
	$resp1 =User::updatepass($request->session()->get('userid'),$request->pass);	
	 $resp1>0?$request->session()->flash('fl_message', 'Passsword changed successfully'):$request->session()->flash('fl_message', 'Error occured');
	}
	

    return redirect('admin/changepass');
    
   }

}?>