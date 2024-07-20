<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    
    
     public function institutions()
    {
        return $this->hasMany(Institution::class);
    }
    
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
}
