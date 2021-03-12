<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;

class Location extends Component
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
    public $repoMethod;
    public $layout;
    public $classes;
    public $params;
    public $radio;
   
    /*
    * Attributes
    */
    public $lat;
    public $lng;
    public $selectedRadio;
    public $inputSearchLocation;

	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($title,$name,$status=true,$isExpanded=true,$type,$repository,$emitTo,$repoAction,$repoAttribute,$listener,$repoMethod='getItemsBy',$layout='location-layout-1',$classes='col-12', $params = [], $radio = []){
		
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
        $this->repoMethod = $repoMethod ?? 'getItemsBy';
        $this->layout = $layout;
        $this->classes = $classes;
        $this->params = $params;
        $this->radio = $radio;
        
        $this->initValues();
        
	}

    /* 
    * Init Values Attributes
    * 
    */
    public function initValues(){
        $this->lat = 0;
        $this->lng = 0;
        $this->selectedRadio = $this->radio['defaultValue'] ?? 0;
        $this->inputSearchLocation = "";
    }

    /* 
    * When updated Lng Attribute
    * 
    */
    public function updatedLng(){

        $this->emitToFilter();
    }

    /* 
    * When updated selectedRadio Attribute
    * 
    */
    public function updatedSelectedRadio(){

        $this->emitToFilter();
      
    }

    /* 
    * Emit To Filter
    * 
    */
    public function emitToFilter(){

        if($this->lat!=0 && $this->lng!=0){

            $this->emit($this->emitTo,[
                'name' => $this->name,
                $this->repoAction => [
                    $this->repoAttribute => [
                        'lat' => $this->lat,
                        'lng' => $this->lng,
                        'radio' => $this->selectedRadio,
                    ]
                ]
            ]);

        }

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
    protected function getListeners(){
        if(!empty($this->listener)){
            return [ 
                $this->listener => 'getData', 
                'filtersClearValues' => 'clearValues'
            ];
        }else{
            return [ 'filtersClearValues' => 'clearValues'];
        }
    }

    /*
    * Listener 
    * Item List Rendered
    */
    public function getData($params){

        
    }

    /*
    * Listener 
    * Filter Clear Values
    */
    public function clearValues(){
      
      $this->initValues(); 

    }

    /*
    * Render
    *
    */
    public function render()
    {

       
        $tpl = 'isite::frontend.livewire.filters.location.layouts.'.$this->layout.'.index';
       
        $ttpl = $this->layout;
        if (view()->exists($ttpl))
            $tpl = $ttpl;
            
        return view($tpl);
			
    }

}