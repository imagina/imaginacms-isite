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
      "contenido" => [
        "title" => "Contenido",
        "fields" => [
          "contentMarginInsideX" => [
            "name" => "contentMarginInsideX",
            "type" => "select",
            "props" => [
              "label" => "Margen en los lados de los textos",
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
          "withTitle" => [
            "name" => "withTitle",
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
          "titleTextSize" => [
            "name" => "titleTextSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Fuente",
              "type" => "number"
            ]
          ],
          "titleTextTransform" => [
            "name" => "tittleFontSize",
            "type" => "select",
            "props" => [
              "label" => "Tamaño Fuente",
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
          "titleColor" => [
            "name" => "titleColor",
            "type" => "select",
            "props" => [
              "label" => "Tamaño Fuente",
              "options" => [
                ["label" => "primary", "value" => "text-primary"],
                ["label" => "secondary", "value" => "text-secondary"],
                ["label" => "warning", "value" => "text-warning"],
                ["label" => "info", "value" => "text-info"],
                ["label" => "danger", "value" => "text-danger"],
                ["label" => "dark", "value" => "text-dark"],
                ["label" => "light", "value" => "text-light"],
                ["label" => "white", "value" => "text-white"]
              ]
            ]
          ],
          "titleAlign" => [
            "name" => "titleAlign",
            "type" => "select",
            "props" => [
              "label" => "Horizontal",
              "options" => [
                ["label" => "centrado", "value" => "justify-content-center text-center"],
                ["label" => "derecha", "value" => "justify-content-end text-right"],
                ["label" => "izquierda", "value" => ""],
              ]
            ]
          ],
          "titleAlignVertical" => [
            "name" => "titleAlignVertical",
            "type" => "select",
            "props" => [
              "label" => "Vertical",
              "options" => [
                ["label" => "arriba", "value" => "align-items-start"],
                ["label" => "centro", "value" => "align-items-center"],
                ["label" => "abajo", "value" => "align-items-end"],
              ]
            ]
          ],
          "titleMarginT" => [
            "name" => "titleMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "titleMarginB" => [
            "name" => "titleMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "titleTextWeight" => [
            "name" => "titleTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => [
                ["label" => "Texto en negrita", "value" => "font-weight-bold"],
                ["label" => "Texto en negrita (relativo al elemento principal)", "value" => "font-weight-bolder"],
                ["label" => "Texto de peso normal", "value" => "font-weight-normal"],
                ["label" => "Texto ligero", "value" => "font-weight-light"],
                ["label" => "Texto más ligero (en relación con el elemento principal)", "value" => "font-weight-lighter"],
                ["label" => "Texto en cursiva", "value" => "font-italic"]
              ]
            ]
          ],
          "titleLetterSpacing" => [
            "name" => "titleLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras",
              "type" => "number"
            ]
          ],
          "titleHeight" => [
            "name" => "titleHeight",
            "type" => "input",
            "props" => [
              "label" => "Alto maximo",
              "type" => "number"
            ]
          ],
          "numberCharactersTitle" => [
            "name" => "numberCharactersTitle",
            "type" => "input",
            "props" => [
              "label" => "Número de caracteres permitidos",
              "type" => "number"
            ]
          ],
          "titleTextDecoration" => [
            "name" => "titleTextDecoration",
            "type" => "select",
            "props" => [
              "label" => "Decoración de texto",
              "options" => [
                ["label" => "Sin decoracion", "value" => "none"],
                ["label" => "underline", "value" => "underline"],
                ["label" => "overline", "value" => "overline"],
                ["label" => "line-through", "value" => "line-through"]
              ]
            ]
          ],
          "titleOrder" => [
            "name" => "titleOrder",
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
          "titleVineta" => [
            "name" => "titleVineta",
            "type" => "input",
            "props" => [
              "label" => "Icon",
              "type" => "text"
            ]
          ],
          "titleVinetaColor" => [
            "name" => "titleVinetaColor",
            "type" => "select",
            "props" => [
              "label" => "Tamaño Fuente",
              "options" => [
                ["label" => "primary", "value" => "text-primary"],
                ["label" => "secondary", "value" => "text-secondary"],
                ["label" => "warning", "value" => "text-warning"],
                ["label" => "info", "value" => "text-info"],
                ["label" => "danger", "value" => "text-danger"],
                ["label" => "dark", "value" => "text-dark"],
                ["label" => "light", "value" => "text-light"],
                ["label" => "white", "value" => "text-white"]
              ]
            ]
          ],
          "withSummary" => [
            "name" => "withSummary",
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
          "summaryTextSize" => [
            "name" => "summaryTextSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Fuenteon",
              "type" => "number"
            ]
          ],
          "summaryAlign" => [
            "name" => "summaryAlign",
            "type" => "select",
            "props" => [
              "label" => "Tamaño Fuente",
              "options" => [
                ["label" => "Centrado", "value" => "text-center"],
                ["label" => "Derecha", "value" => "text-right"],
                ["label" => "Izquierda", "value" => "text-left"],
                ["label" => "Justificado", "value" => "text-justify"]
              ]
            ]
          ],
          "summaryColor" => [
            "name" => "summaryColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => [
                ["label" => "primary", "value" => "text-primary"],
                ["label" => "secondary", "value" => "text-secondary"],
                ["label" => "warning", "value" => "text-warning"],
                ["label" => "info", "value" => "text-info"],
                ["label" => "danger", "value" => "text-danger"],
                ["label" => "dark", "value" => "text-dark"],
                ["label" => "light", "value" => "text-light"],
                ["label" => "white", "value" => "text-white"]
              ]
            ]
          ],
          "summaryMarginT" => [
            "name" => "summaryMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "summaryMarginB" => [
            "name" => "summaryMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "summaryLetterSpacing" => [
            "name" => "summaryLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras",
              "type" => "number"
            ]
          ],
          "summaryTextDecoration" => [
            "name" => "summaryTextDecoration",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "Sin decoracion", "value" => "none"],
                ["label" => "underline", "value" => "underline"],
                ["label" => "overline", "value" => "overline"],
                ["label" => "line-through", "value" => "line-through"]
              ]
            ]
          ],
          "summaryTextWeight" => [
            "name" => "summaryTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => [
                ["label" => "Texto en negrita", "value" => "font-weight-bold"],
                ["label" => "Texto en negrita (relativo al elemento principal)", "value" => "font-weight-bolder"],
                ["label" => "Texto de peso normal", "value" => "font-weight-normal"],
                ["label" => "Texto ligero", "value" => "font-weight-light"],
                ["label" => "Texto más ligero (en relación con el elemento principal)", "value" => "font-weight-lighter"],
                ["label" => "Texto en cursiva", "value" => "font-italic"]
              ]
            ]
          ],
          "numberCharactersSummary" => [
            "name" => "numberCharactersSummary",
            "type" => "input",
            "props" => [
              "label" => "Número de caracteres permitidos",
              "type" => "number"
            ]
          ],
          "summaryHeight" => [
            "name" => "summaryHeight",
            "type" => "input",
            "props" => [
              "label" => "Alto maximo",
              "type" => "number"
            ]
          ],
          "summaryLineHeight" => [
            "name" => "summaryLineHeight",
            "type" => "input",
            "props" => [
              "label" => "Alto de la línea",
              "type" => "number"
            ]
          ],
          "summaryOrder" => [
            "name" => "summaryOrder",
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
          "withCategory" => [
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
          "categoryTextSize" => [
            "name" => "categoryTextSize",
            "type" => "input",
            "props" => [
              "label" => "Orden",
              "type" => "number"
            ]
          ],
          "categoryAlign" => [
            "name" => "categoryAlign",
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
          "categoryColor" => [
            "name" => "categoryColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => [
                ["label" => "primary", "value" => "text-primary"],
                ["label" => "secondary", "value" => "text-secondary"],
                ["label" => "warning", "value" => "text-warning"],
                ["label" => "info", "value" => "text-info"],
                ["label" => "danger", "value" => "text-danger"],
                ["label" => "dark", "value" => "text-dark"],
                ["label" => "light", "value" => "text-light"],
                ["label" => "white", "value" => "text-white"]
              ]
            ]
          ],
          "categoryMarginT" => [
            "name" => "categoryMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "categoryMarginB" => [
            "name" => "categoryMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "categoryLetterSpacing" => [
            "name" => "categoryLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras",
              "type" => "number"
            ]
          ],
          "categoryTextDecoration" => [
            "name" => "categoryTextDecoration",
            "type" => "select",
            "props" => [
              "label" => "Decoración de texto",
              "options" => [
                ["label" => "Sin decoracion", "value" => "none"],
                ["label" => "underline", "value" => "underline"],
                ["label" => "overline", "value" => "overline"],
                ["label" => "line-through", "value" => "line-through"]
              ]
            ]
          ],
          "categoryTextWeight" => [
            "name" => "categoryTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => [
                ["label" => "Texto en negrita", "value" => "font-weight-bold"],
                ["label" => "Texto en negrita (relativo al elemento principal)", "value" => "font-weight-bolder"],
                ["label" => "Texto de peso normal", "value" => "font-weight-normal"],
                ["label" => "Texto ligero", "value" => "font-weight-light"],
                ["label" => "Texto más ligero (en relación con el elemento principal)", "value" => "font-weight-lighter"],
                ["label" => "Texto en cursiva", "value" => "font-italic"]
              ]
            ]
          ],
          "categoryOrder" => [
            "name" => "categoryOrder",
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
          "withCreatedDate" => [
            "title" => "withCreatedDate",
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
          "createdDateTextSize" => [
            "name" => "createdDateTextSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Fuente",
              "type" => "number"
            ]
          ],
          "createdDateAlign" => [
            "name" => "createdDateAlign",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "centrado", "value" => "text-center"],
                ["label" => "derecha", "value" => "text-right"],
                ["label" => "izquierda", "value" => "text-left"],
              ]
            ]
          ],
          "createdDateColor" => [
            "name" => "createdDateColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => [
                ["label" => "primary", "value" => "text-primary"],
                ["label" => "secondary", "value" => "text-secondary"],
                ["label" => "Positivo", "value" => "text-success"],
                ["label" => "warning", "value" => "text-warning"],
                ["label" => "info", "value" => "text-info"],
                ["label" => "danger", "value" => "text-danger"],
                ["label" => "dark", "value" => "text-dark"],
                ["label" => "light", "value" => "text-light"],
                ["label" => "white", "value" => "text-white"]
              ]
            ]
          ],
          "createdDateMarginT" => [
            "name" => "createdDateMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "createdDateMarginB" => [
            "name" => "createdDateMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => [
                ["label" => "0px", "value" => "mt-0"],
                ["label" => "4px", "value" => "mt-1"],
                ["label" => "8px", "value" => "mt-2"],
                ["label" => "16px", "value" => "mt-3"],
                ["label" => "24px", "value" => "mt-4"],
                ["label" => "48px", "value" => "mt-5"]
              ]
            ]
          ],
          "createdDateLetterSpacing" => [
            "name" => "createdDateLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras",
              "type" => "number"
            ]
          ],
          "formatCreatedDate" => [
            "name" => "formatCreatedDate",
            "type" => "select",
            "props" => [
              "label" => "Formato",
              "type" => "number",
              "options" => [
                ["label" => "25 de Feb", "value" => "d\\d\\e M"],
                ["label" => "01/01/2022", "value" => "d/m/Y"],
                ["label" => "01-01-2022", "value" => "d-m-Y"],
                ["label" => "06 de Mar, 2021", "value" => "d \d\e M, Y"],
              ]
            ]
          ],
          "createdDateTextWeight" => [
            "name" => "createdDateTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => [
                ["label" => "Texto en negrita", "value" => "font-weight-bold"],
                ["label" => "Texto en negrita (relativo al elemento principal)", "value" => "font-weight-bolder"],
                ["label" => "Texto de peso normal", "value" => "font-weight-normal"],
                ["label" => "Texto ligero", "value" => "font-weight-light"],
                ["label" => "Texto más ligero (en relación con el elemento principal)", "value" => "font-weight-lighter"],
                ["label" => "Texto en cursiva", "value" => "font-italic"]
              ]
            ]
          ],
          "createdDateTextDecoration" => [
            "name" => "createdDateTextDecoration",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => [
                ["label" => "none", "value" => "Sin decoracion"],
                ["label" => "underline", "value" => "underline"],
                ["label" => "overline", "value" => "overline"],
                ["label" => "line-through", "value" => "line-through"]
              ]
            ]
          ],
          "createdDateOrder" => [
            "name" => "createdDateOrder",
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
      ],
      "imagen" => [
        "title" => "imagen",
        "fields" => [
          "Imagen" => [
            "title" => "Imagen",
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
          "mediaImage" => [
            "name" => "mediaImage",
            "type" => "select",
            "props" => [
              "label" => "Tipo",
              "options" => [
                ["label" => "Principal", "value" => "mainimage"],
                ["label" => "Secundaria", "value" => "secondaryimage"],
              ]
            ]
          ],
          "imagePosition" => [
            "name" => "imagePosition",
            "type" => "select",
            "props" => [
              "label" => "Posición",
              "options" => [
                ["label" => "Overlay", "value" => "1"],
                ["label" => "Derecha", "value" => "2"],
                ["label" => "Izquierda", "value" => "3"]
              ]
            ]
          ],
          "imagePositionVertical" => [
            "name" => "imagePositionVertical",
            "type" => "select",
            "props" => [
              "label" => "Alineación Vertical",
              "options" => [
                ["label" => "arriba", "align-self-start" => "1"],
                ["label" => "centrado", "value" => "align-self-center"],
                ["label" => "abajo", "value" => "align-self-end"]
              ]
            ]
          ],
          "columnLeft" => [
            "name" => "columnLeft",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Columna Izquierda"
            ]
          ],
          "columnRight" => [
            "name" => "columnRight",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Columna Derecha"
            ]
          ],
          "imageWidth" => [
            "name" => "imageWidth",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Columna Derecha",
              "type" => "number"
            ]
          ],
          "imageAlign" => [
            "name" => "imageAlign",
            "type" => "select",
            "props" => [
              "label" => "Alineación Horizontal",
              "options" => [
                ["label" => "izquierda", "value" => "left"],
                ["label" => "centrado", "value" => "center"],
                ["label" => "derecha", "value" => "right"]
              ]
            ]
          ],
          "imagePadding" => [
            "name" => "imagePadding",
            "type" => "input",
            "props" => [
              "label" => "Espaciado antes del borde",
              "type" => "number"
            ]
          ],
          "imagePicturePadding" => [
            "name" => "imagePicturePadding",
            "type" => "input",
            "props" => [
              "label" => "Espaciado luego del borde",
              "type" => "number"
            ]
          ],
          "imageAspect" => [
            "name" => "imageAspect",
            "type" => "select",
            "props" => [
              "label" => "Aspect-ratio",
              "options" => [
                ["label" => "auto", "value" => "auto"],
                ["label" => "1/1", "value" => "1/1"],
                ["label" => "3/2", "value" => "3/2"],
                ["label" => "4/3", "value" => "4/3"],
                ["label" => "4/5", "value" => "4/5"],
                ["label" => "16/9", "value" => "16/9"],
                ["label" => "21/9", "value" => "21/9"]
              ]
            ]
          ],
          "imageObject" => [
            "name" => "imageObject",
            "type" => "select",
            "props" => [
              "label" => "object-fit",
              "options" => [
                ["label" => "contain", "value" => "contain"],
                ["label" => "cover", "value" => "cover"],
                ["label" => "fill", "value" => "fill"],
                ["label" => "Inicial", "value" => "Inicial"],
                ["label" => "Revert", "value" => "Revert"],
                ["label" => "scale-down", "value" => "Scale Down"],
                ["label" => "Unset", "value" => "Unset"],
                ["label" => "none", "value" => "none"]
              ]
            ]
          ],
          "imageBorderRadio" => [
            "name" => "imageBorderRadio",
            "type" => "input",
            "props" => [
              "label" => "Redondeado",
              "type" => "number"
            ]
          ],
          "imageBorderRadioType" => [
            "name" => "imageBorderRadioType",
            "type" => "select",
            "props" => [
              "label" => "Posición",
              "options" => [
                ["label" => "todo", "value" => "1"],
                ["label" => "arriba", "value" => "2"],
                ["label" => "derecha", "value" => "3"],
                ["label" => "izquierda", "value" => "4"],
                ["label" => "abajo", "value" => "5"],
                ["label" => "arriba derecha", "value" => "6"],
                ["label" => "arriba izquierda", "value" => "7"],
                ["label" => "abajo derecha", "value" => "8"],
                ["label" => "abajo izquierda", "value" => "9"]
              ]
            ]
          ],
          "imageBorderWidth" => [
            "name" => "imageBorderWidth",
            "type" => "select",
            "props" => [
              "label" => "Ancho",
              "options" => [
                ["label" => "1", "value" => "1"],
                ["label" => "2", "value" => "2"],
                ["label" => "3", "value" => "3"],
                ["label" => "4", "value" => "4"],
                ["label" => "5", "value" => "5"],
              ]
            ]
          ],
          "imageBorderStyle" => [
            "name" => "imageBorderStyle",
            "type" => "select",
            "props" => [
              "label" => "Estilo",
              "options" => [
                ["label" => "None", "value" => "None"],
                ["label" => "Hidden", "value" => "Hidden"],
                ["label" => "Dotted", "value" => "Dotted"],
                ["label" => "Dashed", "value" => "Dashed"],
                ["label" => "Solid", "value" => "Solid"],
                ["label" => "Double", "value" => "Double"],
                ["label" => "Groove", "value" => "Groove"],
                ["label" => "Ridge", "value" => "Ridge"],
                ["label" => "Inset", "value" => "Inset"],
                ["label" => "Outset", "value" => "Outset"]
              ]
            ]
          ],
          "imageBorderColor" => [
            "name" => "imageBorderColor",
            "type" => "inputColor",
            "props" => [
              "label" => "Color"
            ]
          ],
          "withImageOpacity" => [
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
          "imageOpacityColor" => [
            "name" => "imageOpacityColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => [
                ["label" => "Claro", "value" => "opacity-light"],
                ["label" => "Oscuro", "value" => "opacity-dark"],
                ["label" => "Primary", "value" => "opacity-primary"],
                ["label" => "Secondary", "value" => "opacity-secondary"]
              ]
            ]
          ],
          "imageOpacityDirection" => [
            "name" => "imageOpacityDirection",
            "type" => "select",
            "props" => [
              "label" => "Dirección",
              "options" => [
                ["label" => "Claro", "value" => "opacity-left"],
                ["label" => "Oscuro", "value" => "opacity-right"],
                ["label" => "Primary", "value" => "opacity-top"],
                ["label" => "Secondary", "value" => "opacity-bottom"],
                ["label" => "completo", "value" => "opacity-all"]
              ]
            ]
          ]
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
          "loop" => [
            "name" => "loop",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Loop",
              "options" => [
                ["label" => "Si", "value" => "1"],
                ["label" => "No", "value" => "0"]
              ]
            ]
          ],
          "autoplay" => [
            "name" => "autoplay",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Loop",
              "options" => [
                ["label" => "Si", "value" => "1"],
                ["label" => "No", "value" => "0"]
              ]
            ]
          ],
        ]
      ]
    ]
  ]
];
