<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    
     public function programs()
    {
        return $this->hasMany(Program::class);
    }    
    
}
