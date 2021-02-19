<?php

namespace Modules\Isite\Http\Livewire;

use Livewire\Component;

class Filters extends Component
{
	
    public $filters;

	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($filters = null){
		
        // Elimnando el de Categories por ahora
        unset($filters['categories']);
        unset($filters['product-options']);

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