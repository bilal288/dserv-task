<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserUserGroup extends Model
{
    use SoftDeletes;

    protected $table = 'user_usergroup';

    protected $fillable = [
        'user_id',
        'usergroup_id'
    ];

    protected $dates = ['deleted_at'];

}
