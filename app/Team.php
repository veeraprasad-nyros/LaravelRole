<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Team extends Model
{
    //
    
    protected $fillable = [
        'name', 'user_id'
    ];
}
