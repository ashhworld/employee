<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeesModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        "id",
        "organization_id", 
        "role_id", 
        "full_name", 
        "mobile_no", 
        "email_id", 
        "password", 
        "salary", 
        "age", 
        "gender", 
        "address"
    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function organization() {
        return $this->hasOne('App\OrganizationModel', 'id', 'organization_id')->select();
    }

    public function role() {
        return $this->hasOne('App\RolesModel', 'id', 'role_id')->select();
    }
}
