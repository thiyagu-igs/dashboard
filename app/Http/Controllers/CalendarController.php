<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use Hash;

class CalendarController extends Controller
{
    public function __construct(){
		
   }
   public function login(){
	   
	   return view('login');
   }
   
    public function logout(Request $request){
	   $request->session()->flush();
	   return redirect('login');
	}
	
	/*public function adduser(){
		$userobj = new User;
		$userobj->UserName='test1';
		$userobj->UserEmail='testplayer1@gmail.com';
		$userobj->UserPassword = Hash::make('12345678');
		$userobj->save();
	}*/
	
   public function dologin(Request $request){
	  $validator = Validator::make($request->all(), [
            'Email' => 'required|email',
            'Password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();                    
                       
        }
		
		if (Auth::attempt( array('UserEmail'=>$request->Email,  'password'=>$request->Password)))
		{
			$userarr =  Auth::user();
		   	$request->session()->put(array('username'=>$userarr->UserName,'userid'=>$userarr->id,'usermail'=>$userarr->UserEmail));		
			return redirect('admin');
		}else{
		  $request->session()->flash('fl_message', 'Invalid Email or Password');
		   return view('login');
		}
	   
   }
    public function eventview(Request $request)
    {
		$data = $request->all(); 
      
       $events=  DB::table('booking')->select('*')->where('BookDate','>=',$request->start)
	   											->where('BookDate','<=',$request->end)->get();
	   $resp=array();
	   if(!empty($events)){
		   foreach($events as $loop){
			   $resp[]=array('id'=>$loop->BookID,'title'=>$loop->BookName.'- filler('.$loop->BookCount.')',
			   'start'=>$loop->BookDate,'end'=>$loop->BookEndDate.'T23:59:00','details'=>$loop->BookDetails);
		   }
	   }
	   echo json_encode($resp);
	  // return view('welcome');
    }
}