<?php

namespace Modules\Isite\Http\Livewire\Index;

use Livewire\Component;
use Livewire\WithPagination;
use App;

use Illuminate\Http\Request;

class ItemList extends Component
{

    use WithPagination;

   
    private $firstRequest;

    public $moduleName;
    public $repository;
    public $itemComponentName;
    public $entityName;
    public $responsiveTopContent;

    public $totalItems = 0;

    public $search = '';

    private $order;
    // OrderBy to URL
    public $orderBy;

    public $configs;
    public $itemListLayout;
    public $layoutClass;

    public $moduleParams = [];
    public $filters = [];

    protected $paginationTheme = 'bootstrap';
    protected $emitItemListRendered;


    /**
    * Listeners
    */
    protected $listeners = ['getData'];
    

    /**
    * Query String
    */
    protected $queryString = [
        'search' => ['except' => ''],
        'filters' => ['except' => []],
        'page' => ['except' => 1]
    ];
    
	/*
    * Runs once, immediately after the component is instantiated,
    * but before render() is called
    */
	public function mount( Request $request, $itemListLayout = null, $moduleName = "isite", $entityName = "item", $itemComponentName = "item-list", $params = [] , $responsiveTopContent =null
    ){


        $this->moduleName = strtolower($moduleName);
        $this->entityName = strtolower($entityName);
        
        $this->itemComponentName = $this->moduleName . "::" .$itemComponentName;
        $this->repository = "Modules\\". ucfirst($this->moduleName) . "\Repositories\\" . ucfirst($entityName).'Repository';

        $this->moduleParams = $params;

        $this->responsiveTopContent = $responsiveTopContent ?? ["mobile" =>  true, "desktop" => true];

        $this->initConfigs();
        $this->initValuesOrderBy();
        $this->initValuesLayout();
        $this->initRequest();
       
	}

    /*
    * Init Configs
    *
    */
    public function initConfigs(){

        $this->configs['orderBy'] = config("asgard.{$this->moduleName}.config.orderBy");
        $this->configs['itemListLayout'] = config("asgard.{$this->moduleName}.config.layoutIndex");
    }

    /*
    * Init Values Orderby
    *
    */
    public function initValuesOrderBy(){

        // OrderBy to URL
        $this->orderBy = $this->configs['orderBy']['default'] ?? "nameaz";
        $this->order = $this->configs['orderBy']['options'][$this->orderBy]['order'];

    }

    /*
    * Init Values To ChangeLayout
    *
    */
    public function initValuesLayout(){

        $this->itemListLayout = $itemListLayout ?? $this->configs['itemListLayout']['default'] ?? "four";
        $this->layoutClass = $this->configs['itemListLayout']['options'][$this->itemListLayout]['class'];
    }


    /*
    * Listener - GET DATA FROM FILTERS
    *
    */
    public function getData($params){

        //\Log::info("ITEMLIST - GETDATA - PARAMS: ".json_encode($params));

        if(isset($params["filters"])){
            $this->emitItemListRendered = true;
            $this->filters = array_merge($this->filters, $params["filters"]);
            $this->resetPage();
        }
        
        if(isset($params["order"])){
            $this->emitItemListRendered = false;
            $this->orderBy = $params['order'];
            $this->resetPage();
        }

        /*
        if(isset($params["layout"])){
            array_merge($this->layout, $params["layout"]);
        
        }
        */

    }

    /*
    * Init Request
    *
    */
    public function initRequest(){
        $this->firstRequest = true;
        $this->emitItemListRendered = false;
        $this->fill(request()->only('search', 'filters','page','orderBy'));
    }

    /*
    * Function Frontend - When change the layout
    *
    */
    public function changeLayout($c){
        $this->itemListLayout = $c;
        $this->layoutClass = $this->configs['itemListLayout']['options'][$this->itemListLayout]['class'];
    }


     /*
    * Make params to Repository
    * before execcute the query
    */
    public function makeParamsToRepository(){

     
        if($this->firstRequest)
            $this->firstRequest = false;

        // To First Time and Others
        $this->order = $this->configs['orderBy']['options'][$this->orderBy]['order'];
        
        if(is_string($this->search) && $this->search){
          $this->filters["search"] = $this->search;
          $this->filters["locale"] = App::getLocale();
        }

        $params = [
            "include" => $this->moduleParams['include'],
            "take" => $this->moduleParams['take'],
            "page" => $this->page ?? 1,
            "filter" => $this->filters,
            "order" =>  $this->order
        ];
       
        if(isset($this->moduleParams['filter']) && !empty($this->moduleParams['filter']) ){
             $params["filter"] = array_merge_recursive($params["filter"], $this->moduleParams['filter']); 
        }

        return $params;
        
    }

    /*
    * Get Item Repository
    *
    */
    private function getItemRepository(){
        return app($this->repository);
    }

   
    /*
    * Render
    *
    */
    public function render(){
        
        
        if(!$this->firstRequest && !in_array('orderBy', $this->queryString)){
            array_push($this->queryString, 'orderBy');
        }
       
        $params = $this->makeParamsToRepository();
        //\Log::info("ITEM LIST - RENDER - PARAMS QUERY ".json_encode($params));

        $items = $this->getItemRepository()->getItemsBy(json_decode(json_encode($params)));

        $this->totalItems = $items->total();

        $tpl = 'isite::frontend.livewire.index.item-list';

        // Add value name to order on Filter
        $params ['orderBy'] = $this->orderBy;

        // Emit Finish Render
        //\Log::info("Emit list rendered: ".json_encode($this->emitItemListRendered));
        $this->emitItemListRendered ? $this->emit('itemListRendered', $params) : false;

        return view($tpl,['items'=> $items, 'params' => $params]);
        
    }

}