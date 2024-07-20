<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    public function programs() {
        return $this->belongsToMany(Program::class,'institution_program')->using(InstitutionProgram::class)->withPivot('institution_id','description','duration','tuition_fee','requirements','utme_cutoff');
    }


    public function institutions() {
        return $this->belongsToMany(Institution::class,'institution_program')->using(InstitutionProgram::class)->withPivot('program_id','description','duration','tuition_fee','requirements','utme_cutoff');
    }



// for level_programs relationship
    public function __programs() {
        return $this->belongsToMany(Program::class,'level_program')->using(InstitutionProgram::class);
    }


    
}
