<?php

namespace Modules\Isite\Http\Livewire;

use Livewire\Component;

class Filters extends Component
{
	
    public $filters;


    // Un evento tipo items list
    // Lo que hace el item list en el get data
    // Array merge
    // Metodo de Borrar

	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($filters = null){
		
        // Elimnando el de Categories por ahora
        unset($filters['categories']);
        
        $this->filters = $filters;

	}

    /*
    * Render
    *
    */
    public function render()
    {


    	$tpl = 'isite::frontend.livewire.filters';
    	
    	
		return view($tpl);
			
    }

}