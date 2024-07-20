<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\Level;
use App\Models\Program;

class SearchForm extends Component
{

   public $allLevels = [];
   public $allPrograms = [];

   public $states = [];
   public $levels = [];
   public $programs = [];
   public $count = 0;
   public $fullSearch;
  

   public $selectedLevel = null;


     public function mount()
      {
           $this->allLevels = Level::with('__programs')->get();
           $this->levels = $this->allLevels;

           $this->allPrograms = Program::all();
           $this->programs = $this->allPrograms;

           $this->states = State::all();

       }


        public function updatedSelectedLevel($value)
   {
               if($value){

                    $levels = $this->allLevels->where('slug',$value)->first();
                    $this->programs = $levels->__programs;
                    } 
                   else {
                       $this->programs = $this->allPrograms;
                    }
          
          $this->count = $this->count + 1 ;
          $this->dispatch('programSelected');

         
   }






    public function render()
    {
        return view('livewire.search-form');
    }


   




}
