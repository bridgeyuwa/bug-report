<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model {

    use HasFactory;

    public function socialtype() {
        return $this->belongsTo(Socialtype::class);
    }

   public function institution() {
        return $this->belongsTo(Institution::class);
    }

}
