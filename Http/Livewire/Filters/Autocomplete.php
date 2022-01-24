<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Isearch\Repositories\SearchRepository;
use Illuminate\Support\Str;

class Autocomplete extends Component
{

  /*
  * Attributes From Config
  */
  public $title;
  public $name;
  public $status;
  public $type;
  public $repository;
  public $listener;
  public $layout;
  public $classes;
  public $options;
  public $params;
  public $emitTo;
  public $repoAction;
  public $repoAttribute;
  public $repoMethod;

  /*
  * Attributes
  */
  public $view;
  public $search;
  public $defaultView;
  protected $results;
  public $showModal;
  public $icon;
  public $placeholder;
  public $minSearchChars;
  public $repositories;
  public $buttonSearch;

  protected $queryString = [
    'search' => ['except' => ''],
  ];

  public function mount($name = null, $layout = 'autocomplete-layout-1', $showModal = false, $icon = 'fa fa-search',
                        $placeholder = null, $title = '', $params = [], $buttonSearch = false, $emitTo = null,
                        $repoAction = null, $repoAttribute = null, $repoMethod = null)
  {

    $this->defaultView = 'isite::frontend.livewire.filters.autocomplete.layouts.autocomplete-layout-1.index';
    $this->view = isset($layout) ? 'isite::frontend.livewire.filters.autocomplete.layouts.' . $layout . '.index' : $this->defaultView;
    $this->results = [];
    $this->showModal = isset($showModal) ? $showModal : false;
    $this->icon = isset($icon) ? $icon : 'fa-search';
    $this->placeholder = $placeholder ?? trans('isearch::common.form.search_here');
    $this->title = $title;
    $this->name = $name;
    $minSearchChars = setting('isearch::minSearchChars', null, "3");
    $this->minSearchChars = $minSearchChars;
    $this->buttonSearch = $buttonSearch;
    $this->emitTo = $emitTo;
    $this->repoAction = $repoAction;
    $this->repoAttribute = $repoAttribute;
    $this->repoMethod = $repoMethod;
    $this->params = $params ?? ["filter" => []];
  }

  public function hydrate()
  {
    \Log::info('Autocomplete: HYDRATE');
    $this->results = [];
  }

  /*
 * When SelectedOption has been selected
 */
  public function updatedSearch()
  {
    \Log::info("UpdatedSearch",[$this->emitTo]);
    if (!empty($this->emitTo)) {
      $this->emit($this->emitTo, [
        'name' => $this->name,
        $this->repoAction => [
          $this->repoAttribute => $this->search ?? null
        ]
      ]);
    }

  }

  private function makeParamsFunction()
  {
    return [
      "include" => $this->params["include"] ?? ['category'],
      "take" => $this->params["take"] ?? 12,
      "page" => $this->params["page"] ?? false,
      "filter" => array_merge_recursive($this->params["filter"], ["search" => $this->search, "locale" => \App::getLocale()]),
      "order" => $this->params["order"] ?? null,
    ];
  }

  public function render()
  {
    $params = $this->makeParamsFunction();
    $validatedData = Validator::make(
      ['search' => $this->search],
      ['search' => 'required|min:' . $this->minSearchChars]
    );
    if ($this->search) {
      if ($validatedData->fails()) {
        $this->alert('error', trans('isearch::common.index.Not Valid', ["minSearchChars" => $this->minSearchChars]), config("asgard.isite.config.livewireAlerts"));
      } else {

        $this->results = $this->searchRepository()->getItemsBy(json_decode(json_encode($params)));
      }
      $search = Str::lower($this->search);
      $this->results = $this->results->sortByDesc(function ($item, $key) use ($search) {
        $initial = 0;
        $haystack = Str::lower($item->title ?? $item->name);
        $bits_of_haystack = explode(' ', $haystack);
        foreach (explode(" ", $search) as $substring) {
          if (!in_array($substring, $bits_of_haystack))
            continue; // skip this needle if it doesn't exist as a whole word
          $initial += substr_count($haystack, $substring);
        }
        return $initial;
      });
    }
    return view($this->view, ["results" => $this->results]);
  }

  public function goToIndex()
  {
    $locale = LaravelLocalization::setLocale() ?: \App::getLocale();
    $routeLink = config('asgard.isearch.config.route', 'isearch.search');
    $rl = $routeLink;
    if (!empty($this->search)) {
      if (!Route::has($rl)) { //if route does not exist without locale, pass route with locale
        $rl = $locale . '.' . $routeLink;
      }
      if (!Route::has($rl)) { //if route with locale does not exist either, pass the isearch default route
        $rl = $locale . '.isearch.search';
      }
      $this->redirect(\URL::route($rl) . '?search=' . $this->search);
    }
  }

  /**
   * @return SearchRepository
   */
  private function searchRepository()
  {
    return app('Modules\Isearch\Repositories\SearchRepository');
  }
}
