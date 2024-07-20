<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\State;
use App\Models\Program;
use App\Models\Level;
use Illuminate\Database\Eloquent\Builder;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class SearchController extends Controller {

    public function index(Request $request) {

        $state_slug = $request->input('location');
        $level_slug = $request->input('level');
        $program_id = $request->input('program');

        $query = Institution::query();

        if ($state_slug && $state = State::where('slug', $state_slug)->first() /* assign found State*/) {
            $query->where('state_id', $state->id);
        }

       
        if ($level_slug && $level = Level::where('slug', $level_slug)->first() /* assign found Level*/)  {
            $query->whereHas('levels', function (Builder $query) use ($level) {
                $query->where('levels.id', $level->id);
            });  
     
        }


        if ($program_id && $program = Program::find($program_id) /*  assign found program*/)  {
            $query->whereHas('programs', function (Builder $query) use ($program) {
                $query->where('programs.id', $program->id);
            });

            /* eager load Program Levels if Program is selected */
          $query->with([
                      'levels' => function($query) use ($program){

                            $query->wherePivot('program_id',$program->id);

                             }
                        ]);
         
        }


         
        /* eager load after all above filtering */
          $query->with([
                      'state:id,name',
                      'schooltype:id,name',
                      'category:id,name'
                       
                       ]);

         

                                if(!empty($level) && !empty($program))
                                   {  /* both level and program are selected  */
                                    
                                    $query->with([
                                             'programs' => function($query) use ($program, $level){
                                                  $query->where('program_id',$program->id)->wherePivot('level_id',$level->id)->first();
                                              }
                                     ]);



                                   }

                                 elseif(empty($level) && !empty($program)){  /* only program is selected */
                                   $query->with([
                                             'programs' => function($query) use ($program){
                                                  $query->where('program_id',$program->id);
                                              }
                                     ]);
                                  }
                                  else{ 
                                    /* none is selected */
                                   $query->with('programs');
                                   }
         

        $institutions = $query->paginate(30);

        $institutions = $institutions->withPath('search?location='. $state_slug. '&level=' . $level_slug . '&program=' . $program_id);
        
          if(!isset($state))
           {
            $state = null;
           }
           if(!isset($level))
           {
            $level = null;
           }
            if(!isset($program))
           {
            $program = null;
           }

      
	  
	  
	  $SEOData = new SEOData(
                                          title: 'Search Nigerian Academic Institutions and Programs',
                                          description: 'Use our advanced search to find universities, polytechnics, monotechnics, colleges of education, etc and course programs in Nigeria that match your criteria. Filter by location, study level, course program and more.',

                                       );

        return view('search', compact('institutions', 'program', 'state', 'level','SEOData'));
    }
}
