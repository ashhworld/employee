<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        "id",  "name",  "address",  "is_active"
    ];

   protected $table = 'organizations';

}
