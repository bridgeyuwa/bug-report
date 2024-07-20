<?php

namespace App\Http\Controllers;

use App\Models\Catchment;
use App\Models\Region;
use App\Models\Category;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class CatchmentController extends Controller {

    public function index() {

     $regions = Region::with('catchments.institutions')->get();
       
        $SEOData = new SEOData(
                               title: 'Universities in Nigeria by Catchment Area',
				description: 'Discover universities in Nigeria based on catchment areas',  );

        return view('catchment.index', compact('regions','SEOData'));
    }

    public function show(Catchment $catchment) {
        $institutions = $catchment->institutions()->with(['state','schooltype','category'])->get();

           $SEOData = new SEOData(
                               title: 'Universities with '.$catchment->name. ' as Catchment Area]',
				   description: 'Explore institutions within the '.$catchment->name. ' catchment area of Nigeria. Find programs and compare institutions.',  );

        return view('catchment.show', compact('catchment','institutions','SEOData'));
    }



      public function policy() {
		  
		  
      $SEOData = new SEOData(
                               title: 'Catchment Area Policy',
                                description: 'Understand the policies for catchment areas for Federal Universities in Nigeria.', 
                             );

        return view('catchment.policy',compact('SEOData'));
    }
}
