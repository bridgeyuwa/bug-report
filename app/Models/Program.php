<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model {

    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function college() {
        return $this->belongsTo(College::class);
    }



// add "specific" as prefix to the many to many relationship for all functions of institution_program_level

    public function institutions() {
        return $this->belongsToMany(Institution::class,'institution_program')->using(InstitutionProgram::class)->withPivot('level_id','description','duration','tuition_fee','requirements','utme_cutoff');
    }

    
    
    public function levels() {
        return $this->belongsToMany(Level::class,'institution_program')->using(InstitutionProgram::class)->withPivot('institution_id','description','duration','tuition_fee','requirements','utme_cutoff');
    }



// for level_program relationship

public function __levels() {
        return $this->belongsToMany(Program::class,'level_program')->using(InstitutionProgram::class);
    }

   
    

}



