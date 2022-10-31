<?php

return [
  "isiteItem" => [
    "title" => "Elemento",
    "systemName" => "isite::item-list",
    "content" => [
      [
        "label" => "Post",
        "value" => "Modules\Iblog\Entities\Post",
        "loadOptions" => [
          "apiRoute" => "apiRoutes.qblog.posts"
        ]
      ],
      [
        "label" => "Category",
        "value" => "Modules\Iblog\Entities\Category",
        "loadOptions" => [
          "apiRoute" => "apiRoutes.qblog.categories"
        ]
      ]
    ],
    "attributes" => [
      "general" => [
        "title" => "Genera",
        "fields" => [
          "layout" => [
            "name" => "layout",
            "value" => "item-list-layout-6",
            "type" => "select",
            "props" => [
              "label" => "Layout",
              "options" => [
                ["label" => "Layout 6 (Contenido Individual Vertical)", "value" => "item-list-layout-6"],
                ["label" => "Layout 7 (Textos - Imagenes)", "value" => "item-list-layout-7"]
              ]
            ]
          ],
          "contentPadding" => [
            "name" => "contentPadding",
            "type" => "input",
            "props" => [
              "label" => "Espacio Externo",
              "type" => "number"
            ]
          ],
          "itemMarginB" => [
            "name" => "itemMarginB",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Espacio Inferior",
              "options" => [
                ["label" => "0", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "contentBorderRounded" => [
            "name" => "contentBorderRounded",
            "value" => "",
            "type" => "input",
            "props" => [
              "label" => "Borde Redondeado",
              "type" => "number"
            ]
          ],
          "contentBorderRoundedType" => [
            "name" => "contentBorderRoundedType",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Posición del Borde",
              "options" => [
                ["label" => "Todo", "value" => "1"],
                ["label" => "Arriba", "value" => "2"],
                ["label" => "Derecha", "value" => "3"],
                ["label" => "Izquierda", "value" => "4"],
                ["label" => "Abajo", "value" => "5"],
                ["label" => "Arriba Derecha", "value" => "6"],
                ["label" => "Arriba Izquierda", "value" => "7"],
                ["label" => "Abajo Derecha", "value" => "8"],
                ["label" => "Abajo Izquierda", "value" => "9"]
              ]
            ]
          ],
          "contentBorder" => [
            "name" => "contentBorder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Grosor del Borde",
              "options" => [
                ["label" => "1px", "value" => "1"],
                ["label" => "2px", "value" => "2"],
                ["label" => "3px", "value" => "3"],
                ["label" => "4px", "value" => "4"],
                ["label" => "5px", "value" => "5"]
              ]
            ]
          ],
          "contentBorderColor" => [
            "name" => "contentBorderColor",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Del Borde"
            ]
          ],
          "itemBackgroundColor" => [
            "name" => "itemBackgroundColor",
            "type" => "inputColor",
            "props" => [
              "label" => "Color del Fondo"
            ]
          ],
          "itemBackgroundColorHover" => [
            "name" => "itemBackgroundColorHover",
            "type" => "inputColor",
            "props" => [
              "label" => "Color del Fondo (Hover)"
            ]
          ],
          "contentBorderShadows" => [
            "name" => "contentBorderShadows",
            "value" => "none",
            "type" => "select",
            "props" => [
              "label" => "Tamaño de la Sombra",
              "options" => [
                ["label" => "Sin Sombra", "value" => "none"],
                ["label" => "Pequeña", "value" => "0 .125rem .25rem rgba(0,0,0,.075)"],
                ["label" => "Mediana", "value" => "0 .5rem 1rem rgba(0,0,0,.15)"],
                ["label" => "Grande", "value" => "0 1rem 3rem rgba(0,0,0,.175)"]
              ]
            ]
          ],
          "contentBorderShadowsHover" => [
            "name" => "contentBorderShadowsHover",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Sombra en hover mouse",
              "options" => [
                ["label" => "Si", "value" => "1"],
                ["label" => "No", "value" => "0"]
              ]
            ]
          ]
        ]
      ],
      "boton" => [
        "title" => "Botón",
        "fields" => [
          "withViewMoreButton" => [
            "name" => "withViewMoreButton",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => [
                ["label" => "Si", "value" => "1"],
                ["label" => "No", "value" => "0"]
              ]
            ]
          ],
          "buttonLayout" => [
            "name" => "buttonLayout",
            "value" => "rounded-pill",
            "type" => "select",
            "props" => [
              "label" => "Estilo de Botones",
              "options" => [
                ["label" => "Sólo Texto", "value" => ""],
                ["label" => "Botones Semi Cuadrados", "value" => "rounded"],
                ["label" => "Botones Redondos", "value" => "rounded-pill"],
                ["label" => "Botones Cuadrados", "value" => "rounded-0"],
                ["label" => "Botones Outline Semi Cuadrados", "value" => "outline rounded"],
                ["label" => "Botones Outline Redondos", "value" => "outline rounded-pill"],
                ["label" => "Botones Outline Cuadrados", "value" => "outline rounded-0"]
              ]
            ]
          ],
          "buttonSize" => [
            "name" => "buttonSize",
            "value" => "button-normal",
            "type" => "select",
            "props" => [
              "label" => "Espaciado",
              "options" => [
                ["label" => "Normal", "value" => "button-normal"],
                ["label" => "Sin espaciado", "value" => "button-link"],
                ["label" => "Pequeño", "value" => "button-small"],
                ["label" => "Grande", "value" => "button-big"]
              ]
            ]
          ],
          "buttonAlign" => [
            "name" => "buttonAlign",
            "value" => "text-center",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => [
                ["label" => "Centrado", "value" => "text-center"],
                ["label" => "Derecha", "value" => "text-right"],
                ["label" => "Izquierda", "value" => "text-left"]
              ]
            ]
          ],
          "buttonColor" => [
            "name" => "buttonColor",
            "value" => "primary",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => [
                ["label" => "Primario", "value" => "primary"],
                ["label" => "Secudario", "value" => "secondary"],
                ["label" => "Positivo", "value" => "success"],
                ["label" => "Warning", "value" => "warning"],
                ["label" => "Info", "value" => "info"],
                ["label" => "Danger", "value" => "danger"],
                ["label" => "Dark", "value" => "dark"],
                ["label" => "Light", "value" => "light"]
              ]
            ]
          ],
          "buttonMarginT" => [
            "name" => "buttonMarginT",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "0", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "buttonMarginB" => [
            "name" => "buttonMarginB",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen Inferior",
              "options" => [
                ["label" => "0", "value" => "mb-0"],
                ["label" => "4px", "value" => "mb-1"],
                ["label" => "8px", "value" => "mb-2"],
                ["label" => "16px", "value" => "mb-3"],
                ["label" => "24px", "value" => "mb-4"],
                ["label" => "48px", "value" => "mb-5"]
              ]
            ]
          ],
          "buttonTextSize" => [
            "name" => "buttonTextSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño del texto",
              "type" => "number"
            ]
          ],
          "buttonOrder" => [
            "name" => "buttonOrder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Orden",
              "options" => [
                ["label" => "0", "value" => "0"],
                ["label" => "1", "value" => "1"],
                ["label" => "2", "value" => "2"],
                ["label" => "3", "value" => "3"],
                ["label" => "4", "value" => "4"],
                ["label" => "5", "value" => "5"]
              ]
            ]
          ],
          "viewMoreButtonLabel" => [
            "name" => "viewMoreButtonLabel",
            "type" => "input",
            "props" => [
              "label" => "Texto (Agregar Traducción)"
            ]
          ],
          "buttonIcon" => [
            "name" => "buttonIcon",
            "type" => "input",
            "props" => [
              "label" => "Tipo de Icono"
            ]
          ],
          "buttonIconLR" => [
            "name" => "buttonIconLR",
            "value" => "left",
            "type" => "select",
            "props" => [
              "label" => "Posición del icono",
              "options" => [
                ["label" => "Izquierda", "value" => "left"],
                ["label" => "Derecha", "value" => "right"]
              ]
            ]
          ],
        ]
      ]
    ]
  ],
  "isiteCarousel" => [
    "title" => "Carousel",
    "systemName" => "isite::carousel.owl-carousel",
    "nameSpace" => "Modules\Isite\View\Components\Carousel\OwlCarousel",
    "childBlocks" => [
      "item" => "isite::item-list"
    ],
    "content" => [
      [
        "label" => "Post",
        "value" => "Modules\Iblog\Repositories\PostRepository"
      ],
      [
        "label" => "Category",
        "value" => "Modules\Iblog\Entities\Category",
        "loadOptions" => [
          "apiRoute" => "apiRoutes.qblog.categories"
        ]
      ]
    ],
    "attributes" => [
      "general" => [
        "title" => "Genera",
        "fields" => [
          "layout" => [
            "name" => "layout",
            "value" => "item-list-layout-6",
            "type" => "select",
            "props" => [
              "label" => "Layout",
              "options" => [
                ["label" => "Layout 6 (Contenido Individual Vertical)", "value" => "item-list-layout-6"],
                ["label" => "Layout 7 (Textos - Imagenes)", "value" => "item-list-layout-7"]
              ]
            ]
          ],
          "contentPadding" => [
            "name" => "contentPadding",
            "type" => "input",
            "props" => [
              "label" => "Espacio Externo",
              "type" => "number"
            ]
          ],
          "itemMarginB" => [
            "name" => "itemMarginB",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Espacio Inferior",
              "options" => [
                ["label" => "0", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "contentBorderRounded" => [
            "name" => "contentBorderRounded",
            "value" => "",
            "type" => "input",
            "props" => [
              "label" => "Borde Redondeado",
              "type" => "number"
            ]
          ],
          "contentBorderRoundedType" => [
            "name" => "contentBorderRoundedType",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Posición del Borde",
              "options" => [
                ["label" => "Todo", "value" => "1"],
                ["label" => "Arriba", "value" => "2"],
                ["label" => "Derecha", "value" => "3"],
                ["label" => "Izquierda", "value" => "4"],
                ["label" => "Abajo", "value" => "5"],
                ["label" => "Arriba Derecha", "value" => "6"],
                ["label" => "Arriba Izquierda", "value" => "7"],
                ["label" => "Abajo Derecha", "value" => "8"],
                ["label" => "Abajo Izquierda", "value" => "9"]
              ]
            ]
          ],
          "contentBorder" => [
            "name" => "contentBorder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Grosor del Borde",
              "options" => [
                ["label" => "1px", "value" => "1"],
                ["label" => "2px", "value" => "2"],
                ["label" => "3px", "value" => "3"],
                ["label" => "4px", "value" => "4"],
                ["label" => "5px", "value" => "5"]
              ]
            ]
          ],
          "contentBorderColor" => [
            "name" => "contentBorderColor",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Del Borde"
            ]
          ],
          "itemBackgroundColor" => [
            "name" => "itemBackgroundColor",
            "type" => "inputColor",
            "props" => [
              "label" => "Color del Fondo"
            ]
          ],
          "itemBackgroundColorHover" => [
            "name" => "itemBackgroundColorHover",
            "type" => "inputColor",
            "props" => [
              "label" => "Color del Fondo (Hover)"
            ]
          ],
          "contentBorderShadows" => [
            "name" => "contentBorderShadows",
            "value" => "none",
            "type" => "select",
            "props" => [
              "label" => "Tamaño de la Sombra",
              "options" => [
                ["label" => "Sin Sombra", "value" => "none"],
                ["label" => "Pequeña", "value" => "0 .125rem .25rem rgba(0,0,0,.075)"],
                ["label" => "Mediana", "value" => "0 .5rem 1rem rgba(0,0,0,.15)"],
                ["label" => "Grande", "value" => "0 1rem 3rem rgba(0,0,0,.175)"]
              ]
            ]
          ],
          "contentBorderShadowsHover" => [
            "name" => "contentBorderShadowsHover",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Sombra en hover mouse",
              "options" => [
                ["label" => "Si", "value" => "1"],
                ["label" => "No", "value" => "0"]
              ]
            ]
          ]
        ]
      ],
      "boton" => [
        "title" => "Botón",
        "fields" => [
          "withViewMoreButton" => [
            "name" => "withViewMoreButton",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => [
                ["label" => "Si", "value" => "1"],
                ["label" => "No", "value" => "0"]
              ]
            ]
          ],
          "buttonLayout" => [
            "name" => "buttonLayout",
            "value" => "rounded-pill",
            "type" => "select",
            "props" => [
              "label" => "Estilo de Botones",
              "options" => [
                ["label" => "Sólo Texto", "value" => ""],
                ["label" => "Botones Semi Cuadrados", "value" => "rounded"],
                ["label" => "Botones Redondos", "value" => "rounded-pill"],
                ["label" => "Botones Cuadrados", "value" => "rounded-0"],
                ["label" => "Botones Outline Semi Cuadrados", "value" => "outline rounded"],
                ["label" => "Botones Outline Redondos", "value" => "outline rounded-pill"],
                ["label" => "Botones Outline Cuadrados", "value" => "outline rounded-0"]
              ]
            ]
          ],
          "buttonSize" => [
            "name" => "buttonSize",
            "value" => "button-normal",
            "type" => "select",
            "props" => [
              "label" => "Espaciado",
              "options" => [
                ["label" => "Normal", "value" => "button-normal"],
                ["label" => "Sin espaciado", "value" => "button-link"],
                ["label" => "Pequeño", "value" => "button-small"],
                ["label" => "Grande", "value" => "button-big"]
              ]
            ]
          ],
          "buttonAlign" => [
            "name" => "buttonAlign",
            "value" => "text-center",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => [
                ["label" => "Centrado", "value" => "text-center"],
                ["label" => "Derecha", "value" => "text-right"],
                ["label" => "Izquierda", "value" => "text-left"]
              ]
            ]
          ],
          "buttonColor" => [
            "name" => "buttonColor",
            "value" => "primary",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => [
                ["label" => "Primario", "value" => "primary"],
                ["label" => "Secudario", "value" => "secondary"],
                ["label" => "Positivo", "value" => "success"],
                ["label" => "Warning", "value" => "warning"],
                ["label" => "Info", "value" => "info"],
                ["label" => "Danger", "value" => "danger"],
                ["label" => "Dark", "value" => "dark"],
                ["label" => "Light", "value" => "light"]
              ]
            ]
          ],
          "buttonMarginT" => [
            "name" => "buttonMarginT",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "0", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "buttonMarginB" => [
            "name" => "buttonMarginB",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen Inferior",
              "options" => [
                ["label" => "0", "value" => "mb-0"],
                ["label" => "4px", "value" => "mb-1"],
                ["label" => "8px", "value" => "mb-2"],
                ["label" => "16px", "value" => "mb-3"],
                ["label" => "24px", "value" => "mb-4"],
                ["label" => "48px", "value" => "mb-5"]
              ]
            ]
          ],
          "buttonTextSize" => [
            "name" => "buttonTextSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño del texto",
              "type" => "number"
            ]
          ],
          "buttonOrder" => [
            "name" => "buttonOrder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Orden",
              "options" => [
                ["label" => "0", "value" => "0"],
                ["label" => "1", "value" => "1"],
                ["label" => "2", "value" => "2"],
                ["label" => "3", "value" => "3"],
                ["label" => "4", "value" => "4"],
                ["label" => "5", "value" => "5"]
              ]
            ]
          ],
          "viewMoreButtonLabel" => [
            "name" => "viewMoreButtonLabel",
            "type" => "input",
            "props" => [
              "label" => "Texto (Agregar Traducción)"
            ]
          ],
          "buttonIcon" => [
            "name" => "buttonIcon",
            "type" => "input",
            "props" => [
              "label" => "Tipo de Icono"
            ]
          ],
          "buttonIconLR" => [
            "name" => "buttonIconLR",
            "value" => "left",
            "type" => "select",
            "props" => [
              "label" => "Posición del icono",
              "options" => [
                ["label" => "Izquierda", "value" => "left"],
                ["label" => "Derecha", "value" => "right"]
              ]
            ]
          ],
        ]
      ]
    ]
  ]
];
