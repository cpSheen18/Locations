<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	protected $table = 'sysusers';
	protected $primaryKey = 'UserID';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /* protected $fillable = [
        'name', 'username', 'email', 'password', 'phone', 'pswd_auth', 'otp_auth', 'bio_auth',
    ]; */
	protected $fillable = [
        'Full_Name', 'Username', 'email', 'password', 'mobile_no', 'pswd_auth', 'otp_auth', 'bio_auth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
    public function checkAccess($feature, $action)
    {
        if($this->permissions == null)
        {
            $this->permissions = \DB::table('sysuser_template')
                ->leftJoin("rights_detail", "sysuser_template.template_id", "=", "rights_detail.template_id")
                ->leftJoin("feature_masters", "rights_detail.feature_id", "=", "feature_masters.feature_id")
                ->where('sysuser_template.UserID', '=', \Auth::user()->UserID)
                ->get();
        }

        foreach($this->permissions as $permission)
        {
            if($feature == $permission->feature && preg_match("/$action/", $permission->access_type))
            {
                return true;
            }
        }

        return false;
    }
}
