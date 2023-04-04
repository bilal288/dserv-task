<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model
{
    use HasFactory;

    protected $table = "user_groups";
    
     // Define the many-to-many relationship with User
     public function users()
     {
        
         return $this->belongsToMany(User::class);
     }
}
