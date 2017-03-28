<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

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
	
   public function dologin(Request $request){
	  $validator = Validator::make($request->all(), [
            'Email' => 'required|email',
            'Password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }
		$resp=User::validatelogin( $request->Email,  $request->Password);

		if (!empty($resp))
		{
		  $request->session()->put(array('username'=>$resp[0]->UserName,'userid'=>$resp[0]->id,'usermail'=>$resp[0]->UserEmail));
		
			return redirect('admin');
		}else{
		  $request->session()->flash('fl_message', 'Invalid Email or passsword');
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
			   $resp[]=array('id'=>$loop->BookID,'title'=>$loop->BookName.'- rooms('.$loop->BookCount.')',
			   'start'=>$loop->BookDate,'end'=>$loop->BookEndDate.'T23:59:00','details'=>$loop->BookDetails);
		   }
	   }
	   echo json_encode($resp);
	  // return view('welcome');
    }
}