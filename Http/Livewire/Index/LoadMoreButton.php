<?php

namespace Modules\Isite\Http\Livewire\Index;

use Livewire\Component;
use Livewire\WithPagination;
use App;

use Illuminate\Http\Request;

class LoadMoreButton extends Component
{

  use WithPagination;

  public $entityName;
  public $itemComponentNamespace;
  public $itemComponentName;
  public $itemComponentAttributes;
  public $layoutClass;
  public $itemListLayout;
  public $repository;
  public $params;
  public $pagination;

  /**
   * Attributes
   */
  public $loadMore;
  public $showBtnLoadMore;

  /*
  * Runs once, immediately after the component is instantiated,
  * but before render() is called
  */
  public function mount($entityName,$itemComponentNamespace,$itemComponentName,$itemComponentAttributes,$layoutClass,$itemListLayout,$repository,$params,$pagination)
  {

    $this->entityName = $entityName;
    $this->itemComponentNamespace = $itemComponentNamespace;
    $this->itemComponentName = $itemComponentName;
    $this->itemComponentAttributes = $itemComponentAttributes;

    $this->layoutClass = $layoutClass;
    $this->itemListLayout = $itemListLayout;
    $this->repository = $repository;
    $this->params = $params;
    $this->pagination = $pagination;

    $this->loadMore = false;
    $this->showBtnLoadMore = true; 
    
  }

  /*
  * Action
  * Btn load more
  */
  public function loadMore()
  {


    $this->params["page"] = $this->params["page"] + 1;
    $this->loadMore = true;

    $items = $this->getItemRepository()->getItemsBy(json_decode(json_encode($this->params)));

    if(!$items->hasMorePages())
      $this->showBtnLoadMore = false;

    $newHtml = view('isite::frontend.livewire.index.partials.items', [
      'items' => $items,
      'layoutClass' => $this->layoutClass,
      'entityName' => $this->entityName,
      'itemComponentNamespace' => $this->itemComponentNamespace,
      'itemComponentAttributes' => $this->itemComponentAttributes,
      'itemComponentName' => $this->itemComponentName
    ])->render();

    $this->dispatchBrowserEvent('items-load-more-button', [
      'newHtml' => $newHtml  
    ]);
   
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
  public function render()
  {

    $view = 'isite::frontend.livewire.index.load-more-button';
    return view($view);

  }

}