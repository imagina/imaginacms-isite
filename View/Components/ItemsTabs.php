<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;
use Modules\Media\Entities\File;
use Modules\Setting\Entities\Setting;



class ItemsTabs extends Component
{
    public $categories;
    public $categoriesOrder;

    public $componentResponsive;
    public $componentRepository;
    public $componentEntity;
    public $componentMargin;
    public $componentItemsBySlide;
    public $componentEntityName;
    public $componentShowTitle;
    public $componentConfigLayoutIndex;
    public $componentItemComponentAttributes;
    public $componentNavText;
    public $componentModuleName;
    public $componentName;
    public $componentNameSpace;
    public $componentFilter;
    public $componentUse;
    public $componentCategoryRepository;

    public $id;
    public $tabsSection, $tabsNav, $tabsNavStyle, $tabsNavLinkStyle, $tabsNavLinkHoverStyle,
      $tabsNavLinkActiveStyle, $tabsContent, $tabsContentStyle, $alertClass,
      $withTabBtn, $tabBtnStyle, $tabBtnAlign, $tabBtnClass;

    public $view;
    public $itemLayout;
    public $layout;

    public $textVineta, $textVinetaColor, $textVinetaPosition, $textVinetaColorClass, $textClasses,
        $textPosition, $textAlign, $textWithLine, $textLineConfig;
    public $title, $titleColor, $titleColorClass, $titleSize, $titleWeight,
        $titleTransform, $titleLetterSpacing, $titleShadow, $titleUrl, $titleTarget, $titleClasses;
    public $subtitle, $subtitleSize, $subtitleMarginT, $subtitleMarginB, $subtitleColor, $subtitleColorClass,
        $subtitleWeight, $subtitleTransform, $subtitleLetterSpacing, $subtitleShadow, $subtitleClasses;

    public $repository;
    public $itemComponent;
    public $itemListCol;
    public $itemListTake;
    public $itemListPag;
    public $itemListPagType;
    public $itemListPagStyle;
    public $itemListPagStyleGeneral;
    public $carouselAttr;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($repository,
                                $id = null,
                                $categoriesOrder=[],
                                $tabsSection = "",
                                $tabsNav = "",
                                $tabsNavStyle = "",
                                $tabsNavLinkStyle = "",
                                $tabsNavLinkHoverStyle = "",
                                $tabsNavLinkActiveStyle = "",
                                $tabsContent = "border-top border-bottom border-white",
                                $tabsContentStyle = "",
                                $alertClass = "my-5 w-50 mx-auto text-center",
                                $layout = 'item-tabs-layout-1',
                                $view = null,
                                $itemLayout = null,
                                $textVineta = null,
                                $textVinetaColor = null,
                                $textVinetaColorClass = null,
                                $textVinetaPosition = null,
                                $titleColor = null,
                                $titleColorClass = null,
                                $title = null,
                                $titleSize = 20,
                                $titleWeight = "font-weight-normal",
                                $titleTransform = null,
                                $titleLetterSpacing = 0,
                                $titleShadow = "",
                                $titleUrl = null,
                                $titleTarget = "_self",
                                $titleClasses = "",
                                $subtitle = null,
                                $subtitleSize = 16,
                                $subtitleMarginT = '',
                                $subtitleMarginB = '',
                                $subtitleColor = null,
                                $subtitleColorClass = null,
                                $subtitleWeight = "font-weight-normal",
                                $subtitleTransform = null,
                                $subtitleLetterSpacing = 0,
                                $subtitleShadow = "",
                                $subtitleClasses = "",
                                $textClasses = "",
                                $textPosition = 2,
                                $textAlign = "",
                                $textWithLine= "",
                                $textLineConfig = [],
                                $itemComponent = null,
                                $itemListCol = "col-6 col-lg-4 mb-3",
                                $itemListTake = 8,
                                $itemListPag = true,
                                $itemListPagType = "normal",
                                $itemListPagStyle = [],
                                $itemListPagStyleGeneral = "",
                                $carouselAttr = [],
                                $componentUse = 'item-list',
                                $componentRepository = 'Modules\Iblog\Repositories\PostRepository',
                                $componentResponsive = '[0 => ["items" =>  2],640 => ["items" => 2],992 => ["items" => 4]]',
                                $componentEntity = 'Modules\Iblog\Entities\Category',
                                $componentMargin = '10',
                                $componentItemsBySlide = '1',
                                $componentEntityName = 'Post',
                                $componentShowTitle = 'false',
                                $componentConfigLayoutIndex = [],
                                $componentItemComponentAttributes = [],
                                $componentNavText = '[`<i class=\"fa fa-angle-left\"></i>`,`<i class=\"fa fa fa-angle-right\"></i>`]',
                                $componentModuleName = 'Iblog',
                                $componentFilter = 'category',
                                $componentName = "isite::item-list",
                                $componentNameSpace = "Modules\Isite\View\Components\ItemList",
                                $withTabBtn = true,
                                $tabBtnStyle = "",
                                $tabBtnAlign = "text-center",
                                $tabBtnClass = "button-primary px-3 py-2",

    )
    {
        $this->id = $id ?? uniqid('tabs');
        $this->repository = $repository;
        $this->layout = $layout ?? 'item-tabs-layout-1';
        $this->categoriesOrder = $categoriesOrder ?? ["field" => "created_at","way" => "asc"];
        $this->tabsSection = $tabsSection;
        $this->tabsNav = $tabsNav;
        $this->tabsNavStyle = $tabsNavStyle;
        $this->tabsNavLinkStyle = $tabsNavLinkStyle;
        $this->tabsNavLinkHoverStyle = $tabsNavLinkHoverStyle;
        $this->tabsNavLinkActiveStyle = $tabsNavLinkActiveStyle;
        $this->tabsContent = $tabsContent;
        $this->tabsContentStyle = $tabsContentStyle;
        $this->alertClass = $alertClass;
        $this->textVineta = $textVineta;
        $this->textVinetaColor = $textVinetaColor;
        $this->textVinetaColorClass = $textVinetaColorClass;
        $this->textVinetaPosition = $textVinetaPosition;
        $this->title = $title;
        $this->titleColor = $titleColor;
        $this->titleColorClass = $titleColorClass;
        $this->titleSize = explode(",",$titleSize);
        $this->titleWeight = $titleWeight;
        $this->titleTransform = $titleTransform ;
        $this->titleLetterSpacing = $titleLetterSpacing;
        $this->titleShadow = $titleShadow;
        $this->titleUrl = $titleUrl;
        $this->titleTarget = $titleTarget;
        $this->titleClasses = $titleClasses;
        $this->subtitle = $subtitle;
        $this->subtitleSize = explode(",",$subtitleSize);
        $this->subtitleMarginT = $subtitleMarginT;
        $this->subtitleMarginB = $subtitleMarginB;
        $this->subtitleColor = $subtitleColor;
        $this->subtitleColorClass = $subtitleColorClass;
        $this->subtitleWeight = $subtitleWeight;
        $this->subtitleTransform = $subtitleTransform;
        $this->subtitleLetterSpacing = $subtitleLetterSpacing;
        $this->subtitleShadow = $subtitleShadow;
        $this->subtitleClasses = $subtitleClasses;
        $this->textClasses = $textClasses;
        $this->textPosition = $textPosition;
        $this->textAlign = $textAlign;
        $this->textWithLine = $textWithLine;
        $this->textLineConfig = $textLineConfig;
        $this->view = "isite::frontend.components.items-tabs.layouts." . $this->layout . ".index";
        $this->itemLayout = $itemLayout ?? $componentItemComponentAttributes["itemLayout"] ?? null;
        $this->itemComponent = $itemComponent ?? "isite::item-list";
        $this->itemListCol = $itemListCol;
        $this->itemListTake = $itemListTake;
        $this->itemListPag = $itemListPag;
        $this->itemListPagType = $itemListPagType;
        //$this->itemListPagStyle = !empty($itemListPagStyle) ? $itemListPagStyle : $config['itemListPagStyle'];
        $this->itemListPagStyle = !empty($itemListPagStyle) ? $itemListPagStyle : [
          "color" => "var(--dark)",
          "size" => "12",
          "width" => "30",
          "height" => "30",
          "radius" => "50%",
          "backgroundActivo" => "var(--primary)",
          "backgroundInactivo" => "transparent",
          "colorHover" => "var(--light)",
          "colorActivo" => "#ffffff",
          "backgroundHover" => "var(--light)",
          "margin" => "0 1px",
        ];
        $this->itemListPagStyleGeneral = $itemListPagStyleGeneral;
        $this->carouselAttr = !empty($carouselAttr) ? $carouselAttr : [
          "take" => "20",
          "margin" => "20",
          "loops" => false,
          "dots" => false,
          "dotsStyle" => "",
          "dotsStyleColor" => "",
          "dotsSize" => "",
          "mediaImage" => "mainimage",
          "autoplay" => false,
          "center" => false,
          "stagePadding" => "0",
          "containerFluid" => false,
          "nav" => false,
          "navIcon" => "arrow",
          "navPosition" => "bottom",
          "navSizeLabel" => "15",
          "navColor" => "primary",
          "navStyleButton" => "",
          "navSizeButton" => "button-link",
        ];
        $this->componentUse = $componentUse ?? 'item-list';
        $this->componentResponsive = $componentResponsive ?? '[0 => ["items" =>  2],640 => ["items" => 2],992 => ["items" => 4]]';
        $this->componentRepository = $componentRepository ?? 'Modules\Iblog\Repositories\PostRepository';
        $this->componentEntity = $componentEntity ?? 'Modules\Iblog\Entities\Category';
        $this->componentMargin = $componentMargin ?? '10';
        $this->componentItemsBySlide = $componentItemsBySlide ?? '1';
        $this->componentEntityName = $componentEntityName ?? 'Post';
        $this->componentShowTitle = $componentShowTitle ?? 'false';
        $this->componentConfigLayoutIndex = $this->getConfigLayoutIndex();
        $this->componentItemComponentAttributes = count($componentItemComponentAttributes) ? $componentItemComponentAttributes : config('asgard.isite.config.indexItemListAttributesItemTabs');
        $this->componentNavText = $componentNavText ?? '[`<i class=\"fa fa-angle-left\"></i>`,`<i class=\"fa fa fa-angle-right\"></i>`]';
        $this->componentModuleName = $componentModuleName;
        $this->componentFilter = $componentFilter;
        $this->componentName = $componentName;
        $this->componentNameSpace = $componentNameSpace;
        $this->withTabBtn = $withTabBtn;
        $this->tabBtnStyle = $tabBtnStyle;
        $this->tabBtnAlign = $tabBtnAlign;
        $this->tabBtnClass = $tabBtnClass;
        $this->getConfig();
        $this->componentCategoryRepository = "Modules\\" . ucfirst($this->componentModuleName) . "\Repositories\CategoryRepository";
    }


  public function getConfigLayoutIndex()
  {
    return [
      'default' => 'tab',
      'options' => [
        'tab' => [
          'name' => 'tab',
          'class' => $this->itemListCol,
          'icon' => 'fa fa-align-justify',
          'status' => true
        ]
      ]
    ];
  }

  /*
  * Config product-list
  *
  */
    function getConfig()
      {
        switch ($this->repository) {
            case 'Modules\Icommerce\Repositories\ProductRepository':
                !$this->itemLayout ? $this->itemLayout = setting('icommerce::productListItemLayout') : false;
                if (is_module_enabled("Icommerce") && $this->itemComponent == "isite::item-list") {
                    $this->componentRepository = $this->repository;
                    $this->componentName = "icommerce::product-list-item";
                    $this->componentNameSpace = "Modules\Icommerce\View\Components\ProductListItem";
                    $this->componentItemComponentAttributes["layout"]="product-list-item-layout-1";
                    $this->componentModuleName="Icommerce";
                    $this->componentEntityName="Product";
                    $this->componentEntity="Modules\Icommerce\Entities\Category";
                }
                break;
        }
    }

  /*
  * Get Category Repository App
  *
  */
  private function getCategoryRepository()
  {
    return app($this->componentCategoryRepository);
  }

  /*
  * Categories Featured from Repository
  */
  public function getFeaturedCategories(){

    $params = [
      "filter" => [
        "featured" => true,
        "order" => $this->categoriesOrder,
      ]
    ];

    $this->categories = $this->getCategoryRepository()->getItemsBy(json_decode(json_encode($params))) ?: null;

  }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $this->getFeaturedCategories();
        return view($this->view);
    }
}

