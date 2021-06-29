<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model  
{
  

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booking';
	protected $primaryKey = 'BookID'; 
	// protected $dates = ['BookDate','BookEndDate'];
const CREATED_AT = 'BookCreatedDt';
const UPDATED_AT = 'BookModifiedDt';
   
	public function deletebooking($id){
		DB::table('booking')->where('BookID', $id)->delete();
	}
	
}
