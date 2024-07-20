<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Level;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ProgramController extends Controller
{
    /* list programs at a particular Level of study */

    public function index(Level $level) {
//eager load programs for tuition computation
$level->load('programs');
    

// Get the programs with the college relationship eager loaded
$programs = $level->__programs()->with('college')->get();

// Initialize an empty array to store programs grouped by college
$colleges = [];

// Iterate over each program
foreach ($programs as $program) {
    // Retrieve the college name associated with the program
    $collegeName = $program->college->name;

    // Check if the college exists in the array
    if (!isset($colleges[$collegeName])) {
        // If not, initialize an empty array for the college
        $colleges[$collegeName] = [];
    }

    // Add the program to the array under the college
    $colleges[$collegeName][] = $program;
}

// Now $colleges is an associative array where keys are college names
// and values are arrays of programs associated with each college



        $SEOData = new SEOData(
                                          title: $level->name. ' Course Programs in Nigeria',
                                          description: 'Discover '.$level->name. ' programs across academic institutions in Nigeria. Compare and choose the best course program for your academic journey.',

                                       );
 
           return view('program.index', compact('colleges','level','SEOData'));
    }





    /* show a program of a level of study */

 public function show( Level $level, Program $program) {

//eager load programs on level for tuition fee range computation
$level->load([ 'programs' => function ($query) use($program) {
    $query->where('program_id', $program->id);

}]);


/* for generic program data at levels */
 $program = $level->__programs()->where('program_id', $program->id)->first();


  $SEOData = new SEOData(
                                          title: $level->name. ' in '.$program->name. ' in Nigeria',
                                       );


return view('program.show', compact('level','program','SEOData'));
    }
    

/* list institutions which have a program */

 public function institutions(Level $level, Program $program) {

//eager load programs on level for tuition fee range computation
$level->load([ 'programs' => function ($query) use($program) {
    $query->where('program_id', $program->id);

}]);


$institutions = $program->institutions()->with(['schooltype','category','state'])->wherePivot('level_id', $level->id)->paginate(60);



      $SEOData = new SEOData(
                               title: 'Academic Institutions Offering '.$level->name. ' in '.$program->name.' in Nigeria',
                               description: 'Academic institutions offering '.$level->name. ' in ' .$program->name. '. Explore the collection of institutions to make informed decisions.',
                                       );
      return view('program.institutions', compact('level','program','institutions','SEOData'));
    }
    
}
