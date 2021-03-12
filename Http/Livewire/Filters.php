<?php

namespace Modules\Isite\Http\Livewire;

use Livewire\Component;

class Filters extends Component
{
	
    public $filters;
    public $showResponsiveModal;
    public $showBtnFilter;
    public $showBtnClear;

    public $filterValues;

    /**
    * Listeners
    */
    protected $listeners = ['getDataFromFilters'];


	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($filters = null,$showResponsiveModal = true,$showBtnFilter=false,$showBtnClear=false){

        $this->filters = $filters;
        $this->showResponsiveModal = $showResponsiveModal;
        $this->showBtnFilter = $showBtnFilter;
        $this->showBtnClear = $showBtnClear;

	}


    /*
    * LISTENER
    */
    public function getDataFromFilters($params){

        //\Log::info("FILTERS - GETDATA - PARAMS: ".json_encode($params));
        if(isset($params["filter"])){
            
            //$this->filterValues = array_merge($this->filterValues, $params["filter"]);
            
            // getData (Seria el de Item List)
            /*
            $this->emit('getData',[
                'filter' => $this->filterValues
            ]);
            */
            
        }

    }

    /*
    * Event to clear all filters
    *
    */
    public function clearFilters(){
        //\Log::info("FILTERS - ");

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