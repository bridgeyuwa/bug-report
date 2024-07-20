<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialtype extends Model {

    use HasFactory;

    public function socials() {
        return $this->hasMany(Social::class);
    }

   
}
