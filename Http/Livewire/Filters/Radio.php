<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;

class Radio extends Component
{
	
    /*
    * Attributes From Config
    */
    public $title;
    public $name;
    public $status;
    public $isExpanded;
    public $options;
    public $type;
    public $repository;
    public $emitTo;
    public $repoAction;
    public $repoAttribute;
    public $listener;
    public $getDataRepo;
    public $layout;
    public $classes;

    /*
    * Attributes
    */
    public $selectedOption;
    public $show;

	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($title,$name,$status=true,$isExpanded=true,$options,$type,$repository,$emitTo,$repoAction,$repoAttribute,$listener,$getDataRepo,$layout='default',$classes='col-xs-12'){
		
        $this->title = trans($title);
        $this->name = $name;
        $this->status = $status;
        $this->isExpanded = $isExpanded;
        $this->options = $options;
        $this->type = $type;
        $this->repository = $repository;
        $this->emitTo = $emitTo;
        $this->repoAction = $repoAction;
        $this->repoAttribute = $repoAttribute;
        $this->listener = $listener;
        $this->getDataRepo = $getDataRepo;
        $this->layout = $layout;
        $this->classes = $classes;

        $this->show = false;

	}

    /*
    * When SelectedOption has been selected
    */
    public function updatedSelectedOption(){

        $this->emit($this->emitTo,[
            $this->repoAction => [
                $this->repoAttribute => (boolean)$this->selectedOption
            ]
        ]);
        
        $this->isExpanded = true;
    }

    /*
    * Get Repository
    *
    */
    private function getRepository(){
        return app($this->repository);
    }

    /*
    * Get Listener From Config
    *
    */
    protected function getListeners()
    {
        return [ $this->listener => 'getData'];
    }

     /*
    * Listener 
    * Item List Rendered (Like First Version)
    */
    public function getData($params){

        $resultShowFilter = $this->getRepository()->{$this->getDataRepo}(json_decode(json_encode($params)));

        // Validation from URL
        if(isset($params["filter"][$this->repoAttribute])){
            $this->selectedOption = $params["filter"][$this->repoAttribute];
            $this->show = true;
        }

        if($this->isExpanded || $resultShowFilter)
            $this->show = true;

    }

    /*
    * Render
    *
    */
    public function render()
    {


    	$tpl = 'isite::frontend.livewire.filters.radio.layouts.'.$this->layout.'.index';
        
		return view($tpl);
			
    }

}