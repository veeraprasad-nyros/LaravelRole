<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Member extends Model
{
    //
    protected $fillable = [
        'team_id', 'member_id'
    ];
}
