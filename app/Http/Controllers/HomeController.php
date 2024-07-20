<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Program;
use App\Models\Category;
use App\Models\Level;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class HomeController extends Controller {

    public function index() {

        $institutions = Institution::all();
        $programs = Program::all();
		$categories = Category::all();
		$levels = Level::all(); 
        
        $SEOData = new SEOData( 
                           description: 'Discover universities, polytechnics, monotechnics, and colleges of education in Nigeria. Explore the online directory academic course programs, rankings, and more on Study Nexus.',
                               );
							   



/*
$filePath = public_path('files.json');

$fileContent = file_get_contents($filePath);

$data = json_decode($fileContent);


foreach($data as &$obj){
	
	$institution = $obj->institutions_list;
	
	unset($obj->institutions_list);
	
	$obj = (object) array_merge(['institutions_list' => $institution], (array) $obj);		
}

$allSql ='';

foreach($data as &$obj){
	
	$institution = $obj->institutions_list;
	
	 unset($obj->institutions_list);  //to remove institution id from the json
		
	$program = $obj->title;
	
	unset($obj->title);   //to remove program id from the json
	
	 $encodedObj = json_encode($obj);
	 $escapedData = addslashes($encodedObj);
	 
	//prepare SQL
	$sql = "INSERT INTO institution_program (institution_id, program_id, level_id, requirement) VALUES ('$institution','$program',1,'$escapedData');";
	
	$allSql .= $sql .PHP_EOL ;	
}

 //$reorderedJson = json_encode($data, JSON_PRETTY_PRINT);

$newFilePath = public_path('decodedFile.json');

$newFileContent = file_put_contents($newFilePath, $allSql);

*/



       return view('home', compact('institutions','programs','categories','levels','SEOData'));
    }

}
