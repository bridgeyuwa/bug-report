<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model {

    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
 

    public function programs() {
        return $this->belongsToMany(Program::class,'institution_program')->using(InstitutionProgram::class)->withPivot('level_id','description','duration','tuition_fee','requirements','utme_cutoff');
    }

   public function levels() {
        return $this->belongsToMany(Level::class,'institution_program')->using(InstitutionProgram::class)->withPivot('program_id','description','duration','tuition_fee','requirements','utme_cutoff');
    }

   

    public function state() {
        return $this->belongsTo(State::class);
    }

   public function regions() {
        return $this->hasOneThrough(Region::class, State::class);
    }
    
    
    public function schooltype() {
        return $this->belongsTo(Schooltype::class);
    }

    public function term() {
        return $this->belongsTo(Term::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }    
    
     public function catchments()
    {
        return $this->belongsToMany(Catchment::class);
    }
    

    public function phonenumbers() {
        return $this->hasMany(Phonenumber::class);
    }



    public function socials() {
        return $this->hasMany(Social::class);
    }
    
}
