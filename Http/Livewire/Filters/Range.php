<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;

class Range extends Component
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
    public $priceMin;
    public $priceMax;
    public $step;
    public $selPriceMin;
    public $selPriceMax;


	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount($title,$name,$status=true,$isExpanded=true,$type,$repository,$emitTo,$repoAction,$repoAttribute,$listener,$getDataRepo,$layout='default',$classes='col-xs-12',$step = null){

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
        $this->step = $step ?? 10000;

       
        $this->priceMin = 0;
        $this->priceMax = 1;
        $this->selPriceMin = 0;
        $this->selPriceMax = 1;
	}


    /**
   * Update Range
   * Emit updateFilter
   *
   */
    public function updateRange($data){

       
        $this->selPriceMin = $data["selPriceMin"];
        $this->selPriceMax = $data["selPriceMax"];
        
        /**
            Example: 
            emitTo = getData (To ItemList Listener)
            repoAction => 'filter' (To Product Repository),
            repoAttribute = 'priceRange' (To Product Repository),
        */
        $this->emit($this->emitTo,[
            $this->repoAction => [
              $this->repoAttribute => [
                'from' => $this->selPriceMin,
                'to' => $this->selPriceMax
              ]
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
        return [
            $this->listener => 'getData',
            'updateRange'
        ];
    }

    /*
    * Listener 
    * Item List Rendered (Like First Version)
    */
    public function getData($params){

        // Testing
        //\Log::info("GET DATA - PARAMS: ".json_encode($params));
       
        $selectedPrices  = $params["filter"][$this->repoAttribute] ?? null;

        $range = $this->getRepository()->{$this->getDataRepo}(json_decode(json_encode($params)));

        //Getting the new price range
        $this->priceMin = round($range->minPrice);
        $this->priceMax = round($range->maxPrice);

        //Validating if the user had selected prices 
        if(!empty($selectedPrices)){
            $this->selPriceMin = $selectedPrices["from"];
            $this->selPriceMax = $selectedPrices["to"]; 
        }else{
            $this->selPriceMin = $this->priceMin;
            $this->selPriceMax = $this->priceMax;
        }

        //Validating if there is no price range
        if($this->selPriceMin==$this->selPriceMax && $this->priceMin==$this->selPriceMin && $this->priceMax==$this->selPriceMax){
            $this->show = false;
        }else{
            $this->show = true;
        }

        if($this->priceMax==0)
            $this->show = false;

        $originalPriceMax = $this->priceMax;

        // Sum Step Because the widget performs a calculation for the range
        $this->priceMax+=intval($this->step);

        // Validating the selected price if the "step" has increased the maximum value
        if($this->selPriceMax==$originalPriceMax && $this->selPriceMax!=$this->priceMax){
            $this->selPriceMax = $this->priceMax;
        }

        // Dispatch Event to FrontEnd JQuery Layout Slider
        $this->dispatchBrowserEvent('filter-prices-updated', [
            'newPriceMin' => $this->priceMin,
            'newPriceMax' => $this->priceMax,
            'newSelPriceMin' => $this->selPriceMin,
            'newSelPriceMax' => $this->selPriceMax,
            'step' => $this->step
        ]);
        

    }

    /*
    * Render
    *
    */
    public function render()
    {

        
    	$tpl = 'isite::frontend.livewire.filters.range.layouts.'.$this->layout.'.index';

		return view($tpl);
			
    }

}