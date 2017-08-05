<?php

namespace App;
use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'Username', 'Password','password_confirmation'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
	public function getAuthPassword() {
        return $this->UserPassword;
    }
	
	public function getuserdet($email){
		if($email!='')
    	return DB::table('users')->where('UserName', $email)->get();
		else
		return array();
    }
	
	public static function validatelogin($email,$pass){
		if($email!='')
    	return DB::table('users')->where(array('UserEmail'=> $email,'UserPassword'=>Hash::make($pass)))->get();
		else
		return array();
    }
	
	 public static function updatepass($uid,$newpass){
    	return DB::table('users')->where('id', $uid)->update(array('UserPassword'=>Hash::make($newpass)));
    }
}
