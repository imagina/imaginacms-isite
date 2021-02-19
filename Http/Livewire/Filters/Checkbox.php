<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;

class Checkbox extends Component
{
	
    /*
    * Attributes From Config
    */
    public $title;
    public $name;
    public $status;
    public $isExpanded;
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
    protected $options;
    public $selectedOptions;

	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($title,$name,$status=true,$isExpanded=true,$type,$repository,$emitTo,$repoAction,$repoAttribute,$listener,$getDataRepo,$layout='checkbox-layout-1',$classes='col-12'){
		
        $this->title = trans($title);
        $this->name = $name;
        $this->status = $status;
        $this->isExpanded = $isExpanded;
        $this->type = $type;
        $this->repository = $repository;
        $this->emitTo = $emitTo;
        $this->repoAction = $repoAction;
        $this->repoAttribute = $repoAttribute;
        $this->listener = $listener;
        $this->getDataRepo = $getDataRepo;
        $this->layout = $layout;
        $this->classes = $classes;
      

        $this->selectedOptions = [];
       
	}

    /*
    * When an Option has been selected
    * 
    */
    public function updatedSelectedOptions(){
    
        $this->emit($this->emitTo,[
            $this->repoAction => [
                $this->repoAttribute => array_values($this->selectedOptions)
            ]
        ]);

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

        $this->selectedOptions  = $params["filter"][$this->repoAttribute] ?? [];
        
        $this->options = $this->getRepository()->{$this->getDataRepo}(json_decode(json_encode($params)));
    }

    /*
    * Render
    *
    */
    public function render()
    {

        // Validation to Is Expanded
        $count = count(array_intersect($this->options ? $this->options->pluck("id")->toArray() : [],$this->selectedOptions));
        
        if($count) $this->isExpanded = true;
       

        $tpl = 'isite::frontend.livewire.filters.checkbox.layouts.'.$this->layout.'.index';
       
        $ttpl = $this->layout;
        if (view()->exists($ttpl))
            $tpl = $ttpl;
            
        return view($tpl,['options' => $this->options]);
			
    }

}