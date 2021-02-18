<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;

class Radio extends Component
{
	
    public $filter;
    public $index;
    public $isExpanded;

	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($filter = null,$index){
		
        $this->filter = $filter;
        $this->index = $index;
        $this->isExpanded = $filter['isExpanded'] ?? false;

	}

    /*
    * Render
    *
    */
    public function render()
    {


    	$tpl = 'isite::frontend.livewire.filters.radio.layouts.'.$this->filter['layout'].'.index';
        
		return view($tpl);
			
    }

}