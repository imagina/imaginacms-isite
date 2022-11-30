<?php

$vAttributes = include(base_path() . '/Modules/Isite/Config/standardValuesForBlocksAttributes.php');

return [
  "block" => [
    "title" => "Bloque",
    "systemName" => "x-isite::block",
    "nameSpace" => "Modules\Isite\View\Components\Block",
    "internal" => true,
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "id" => [
            "name" => "id",
            "type" => "input",
            "props" => [
              "label" => "Ingresar el id",
              "type" => "text"
            ]
          ],
          "container" => [
            "name" => "container",
            "value" => "container",
            "type" => "select",
            "props" => [
              "label" => "Tipo de contenedor",
              "options" => $vAttributes["containers"]
            ]
          ],
          /*"borderForm" => [
              "name" => "borderForm",
              "value" => "rounded-0",
              "type" => "select",
              "props" => [
                  "label" => "background container",
                  "options" => [
                      ["label" => "todos los lados", "value" => "rounded"],
                      ["label" => "esquinas arriba redondeado", "value" => "rounded-top"],
                      ["label" => "esquinas de la derecha redondeado", "value" => "rounded-right"],
                      ["label" => "esquinas de abajo redondeado", "value" => "rounded-bottom"],
                      ["label" => "esquinas de la izquierda redondeado", "value" => "rounded-left"],
                      ["label" => "en ciruclo", "value" => "rounded-circle"],
                      ["label" => "por defecto", "value" => "rounded-0"]
                  ]
              ]
          ],
          "display" => [
              "name" => "display",
              "value" => "none",
              "type" => "select",
              "props" => [
                  "label" => "display container",
                  "options" => $vAttributes["display"]
              ]
          ],
          "widthContainer" => [
              "name" => "widthContainer",
              "type" => "input",
              "props" => [
                  "label" => "Ancho del contenedor",
                  "type" => "number"
              ]
          ],
          "heightContainer" => [
              "name" => "heightContainer",
              "type" => "input",
              "props" => [
                  "label" => "Alto del contenedor",
                  "type" => "number"
              ]
          ],
          "paddingX" => [
              "name" => "paddingX",
              "type" => "input",
              "props" => [
                  "label" => "padding large",
                  "type" => "number"
              ]
          ],
          "paddingY" => [
              "name" => "paddingY",
              "type" => "input",
              "props" => [
                  "label" => "padding lenght",
                  "type" => "number"
              ]
          ],
          "marginX" => [
              "name" => "marginX",
              "type" => "input",
              "props" => [
                  "label" => "margin large",
                  "type" => "number"
              ]
          ],
          "marginY" => [
              "name" => "marginY",
              "type" => "input",
              "props" => [
                  "label" => "margin lenght",
                  "type" => "number"
              ]
          ],
          "backgrounds" => [
          "name" => "backgrounds",
          "type" => "json",
          "value" => "[{'position':'',
                        'size':'',
                        'repeat':'',
                        'color':'',
                        'backgroundAttachment':''
                      }]",
          "props" => [
            "label" => "datos json",
          ]
        ],
          */
          "overlay" => [
            "name" => "overlay",
            "value" => false,
            "type" => "select",
            "props" => [
              "label" => "Opacidad",
              "options" => [
                ["label" => "false", "value" => false],
                ["label" => "true", "value" => true]
              ]
            ]
          ],
          "backgroundColor" => [
            "name" => "backgroundColor",
            "value" => "",
            "type" => "input",
            "props" => [
              "label" => "Color de fondo"
            ]
          ],
          "row" => [
            "name" => "row",
            "value" => "justify-content-center align-items-center",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Fila (Alineación vertical y horizontal)",
            ]
          ],
          "columns" => [
            "name" => "columns",
            "value" => "col-12",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Columnas",
            ]
          ],
          "blockClasses" => [
            "name" => "blockClasses",
            "value" => "",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Bloque de Clases"
            ]
          ],
          "blockStyle" => [
            "name" => "blockStyle",
            "value" => "",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Bloque de Estilos",
              'type' => 'textarea',
              'rows' => 8,
            ]
          ],
        ]
      ]
    ]
  ],
  "item" => [
    "title" => "Elemento",
    "systemName" => "isite::item-list",
    "nameSpace" => "Modules\Isite\View\Components\ItemList",
    "internal" => true,
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "layout" => [
            "name" => "layout",
            "value" => "item-list-layout-6",
            "type" => "select",
            'columns' => 'col-12',
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
              "label" => "Margen Inferior",
              "options" => $vAttributes["marginB"]
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
              "options" => $vAttributes["contentBorderRoundedType"]
            ]
          ],
          "contentBorder" => [
            "name" => "contentBorder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Grosor del Borde",
              "options" => [
                ["label" => "0", "value" => "0"],
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
              "options" => $vAttributes["contentBorderShadows"]
            ]
          ],
          "contentBorderShadowsHover" => [
            "name" => "contentBorderShadowsHover",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Sombra en hover mouse",
              "options" => $vAttributes["validation"]
            ]
          ],
          "orderClasses" => [
            "name" => "orderClasses",
            "value" => ["photo" => "order-0", "title" => "order-1", "date" => "order-2", "categoryTitle" => "order-3", "summary" => "order-4", "viewMoreButton" => "order-5"],
            "type" => "json",
            "columns" => "col-12",
            "props" => [
              "label" => "Orden de los elementos"
            ]
          ],
        ]
      ],
      "contenido6" => [
        "title" => "Contenido Layout 6",
        "fields" => [
          "contentMarginInsideX" => [
            "name" => "contentMarginInsideX",
            "type" => "select",
            "props" => [
              "label" => "Margen X de los textos",
              "options" => $vAttributes["marginX"]
            ]
          ],
        ],
      ],
      "contenido7" => [
        "title" => "Contenido Layout 7",
        "fields" => [
          "contentPositionVertical" => [
            "name" => "contentPositionVertical",
            "type" => "select",
            "props" => [
              "label" => "Alineación vertical",
              "options" => $vAttributes["positionVertical"]
            ]
          ],
          "contentPaddingLeft" => [
            "name" => "contentPaddingLeft",
            "type" => "input",
            "props" => [
              "label" => "Espaciado izquierdo",
            ]
          ],
          "contentPaddingRight" => [
            "name" => "contentPaddingRight",
            "type" => "input",
            "props" => [
              "label" => "Espaciado derecho",
            ]
          ],
          "containerActive" => [
            "name" => "containerActive",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "Activar Container",
              "options" => $vAttributes["validation"]
            ]
          ],
          "containerType" => [
            "name" => "containerType",
            "value" => "container",
            "type" => "select",
            "props" => [
              "label" => "Tipo de contenedor",
              "options" => $vAttributes["containers"]
            ]
          ],
          "containerJustify" => [
            "name" => "containerJustify",
            "value" => "justify-content-center",
            "type" => "input",
            "props" => [
              "label" => "Alinear Horizontal Fila",
            ]
          ],
          "containerAlign" => [
            "name" => "containerAlign",
            "value" => "align-items-center",
            "type" => "input",
            "props" => [
              "label" => "Alinear Vertical Fila",
            ]
          ],
          "containerColumn" => [
            "name" => "containerColumn",
            "value" => "col-lg-10",
            "type" => "input",
            "props" => [
              "label" => "Ancho de Columna",
            ]
          ],
        ],
      ],
      "title" => [
        "title" => "Titulo",
        "fields" => [
          "withTitle" => [
            "name" => "withTitle",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "titleTextSize" => [
            "name" => "titleTextSize",
            "value" => "20",
            "type" => "input",
            "props" => [
              "label" => "Tamaño",
              "type" => "number"
            ]
          ],
          "titleTextTransform" => [
            "name" => "titleTextTransform",
            "type" => "select",
            "props" => [
              "label" => "Transformar",
              "options" => $vAttributes["textTransform"]
            ]
          ],
          "titleColor" => [
            "name" => "titleColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "titleAlign" => [
            "name" => "titleAlign",
            "type" => "select",
            "props" => [
              "label" => "Alineación Horizontal",
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
              "label" => "Alineación Vertical",
              "options" => $vAttributes["alignItems"]
            ]
          ],
          "titleMarginT" => [
            "name" => "titleMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "titleMarginB" => [
            "name" => "titleMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => $vAttributes["marginB"]
            ]
          ],
          "titleTextWeight" => [
            "name" => "titleTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => $vAttributes["textWeight"]
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
            "value" => "none",
            "type" => "select",
            "props" => [
              "label" => "Decoración",
              "options" => $vAttributes["textDecoration"]
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
              "label" => "Color Icon",
              "options" => $vAttributes["textColors"]
            ]
          ],
        ],
      ],
      "summary" => [
        "title" => "Resumen",
        "fields" => [
          "withSummary" => [
            "name" => "withSummary",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "summaryTextSize" => [
            "name" => "summaryTextSize",
            "value" => "16",
            "type" => "input",
            "props" => [
              "label" => "Tamaño",
              "type" => "number"
            ]
          ],
          "summaryAlign" => [
            "name" => "summaryAlign",
            "value" => "text-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => $vAttributes["textAlign"]
            ]
          ],
          "summaryColor" => [
            "name" => "summaryColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "summaryMarginT" => [
            "name" => "summaryMarginT",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "summaryMarginB" => [
            "name" => "summaryMarginB",
            "value" => "mb-0",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => $vAttributes["marginB"]
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
            "value" => "none",
            "type" => "select",
            "props" => [
              "label" => "Decoración",
              "options" => $vAttributes["textDecoration"]
            ]
          ],
          "summaryTextWeight" => [
            "name" => "summaryTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => $vAttributes["textWeight"]
            ]
          ],
          "numberCharactersSummary" => [
            "name" => "numberCharactersSummary",
            "value" => "100",
            "type" => "input",
            "props" => [
              "label" => "Número de caracteres permitidos",
              "type" => "number"
            ]
          ],
          "summaryHeight" => [
            "name" => "summaryHeight",
            "value" => "",
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
        ],
      ],
      "category" => [
        "title" => "Categoría",
        "fields" => [
          "withCategory" => [
            "name" => "withCategory",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "categoryTextSize" => [
            "name" => "categoryTextSize",
            "value" => "16",
            "type" => "input",
            "props" => [
              "label" => "Tamaño",
              "type" => "number"
            ]
          ],
          "categoryAlign" => [
            "name" => "categoryAlign",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => $vAttributes["align"]
            ]
          ],
          "categoryColor" => [
            "name" => "categoryColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "categoryMarginT" => [
            "name" => "categoryMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "categoryMarginB" => [
            "name" => "categoryMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => $vAttributes["marginB"]
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
            "value" => "none",
            "type" => "select",
            "props" => [
              "label" => "Decoración",
              "options" => $vAttributes["textDecoration"]
            ]
          ],
          "categoryTextWeight" => [
            "name" => "categoryTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => $vAttributes["textWeight"]
            ]
          ],
        ],
      ],
      "date" => [
        "title" => "Fecha",
        "fields" => [
          "withCreatedDate" => [
            "name" => "withCreatedDate",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "createdDateTextSize" => [
            "name" => "createdDateTextSize",
            "value" => "14",
            "type" => "input",
            "props" => [
              "label" => "Tamaño",
              "type" => "number"
            ]
          ],
          "createdDateAlign" => [
            "name" => "createdDateAlign",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => $vAttributes["align"]
            ]
          ],
          "createdDateColor" => [
            "name" => "createdDateColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "createdDateMarginT" => [
            "name" => "createdDateMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "createdDateMarginB" => [
            "name" => "createdDateMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => $vAttributes["marginB"]
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
              "options" => $vAttributes["textWeight"]
            ]
          ],
          "createdDateTextDecoration" => [
            "name" => "createdDateTextDecoration",
            "value" => "none",
            "type" => "select",
            "props" => [
              "label" => "Decoración",
              "options" => $vAttributes["textDecoration"]
            ]
          ],
        ],
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
              "options" => $vAttributes["validation"]
            ]
          ],
          "buttonLayout" => [
            "name" => "buttonLayout",
            "value" => "rounded-pill",
            "type" => "select",
            "props" => [
              "label" => "Estilo de Botones",
              "options" => $vAttributes["buttonStyle"]
            ]
          ],
          "buttonSize" => [
            "name" => "buttonSize",
            "value" => "button-normal",
            "type" => "select",
            "props" => [
              "label" => "Espaciado",
              "options" => $vAttributes["buttonType"]
            ]
          ],
          "buttonAlign" => [
            "name" => "buttonAlign",
            "value" => "text-center",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => $vAttributes["align"]
            ]
          ],
          "buttonColor" => [
            "name" => "buttonColor",
            "value" => "primary",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["bgColor"]
            ]
          ],
          "buttonMarginT" => [
            "name" => "buttonMarginT",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "buttonMarginB" => [
            "name" => "buttonMarginB",
            "value" => "mb-3",
            "type" => "select",
            "props" => [
              "label" => "Margen Inferior",
              "options" => $vAttributes["marginB"]
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
        "title" => "Imagen",
        "fields" => [
          "Imagen" => [
            "name" => "withImage",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "mediaImage" => [
            "name" => "mediaImage",
            "type" => "input",
            "value" => "mainimage",
            "props" => [
              "label" => "Zona"
            ]
          ],
          "imagePosition" => [
            "name" => "imagePosition",
            "type" => "select",
            "props" => [
              "label" => "Posición",
              "options" => $vAttributes["imagePosition"]
            ]
          ],
          "imagePositionVertical" => [
            "name" => "imagePositionVertical",
            "type" => "select",
            "props" => [
              "label" => "Alineación Vertical",
              "options" => $vAttributes["positionVertical"]
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
            "value" => "100",
            "type" => "input",
            "props" => [
              "label" => "Tamaño imagen (%)",
              "type" => "number",
              "min" => "0",
              "max" => "100",
            ]
          ],
          "imageAlign" => [
            "name" => "imageAlign",
            "type" => "select",
            "props" => [
              "label" => "Alineación horizontal",
              "options" => $vAttributes["imageAlign"]
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
            "value" => "1/1",
            "type" => "select",
            "props" => [
              "label" => "Aspect Ratio",
              "options" => $vAttributes["imageAspect"]
            ]
          ],
          "imageObject" => [
            "name" => "imageObject",
            "value" => "cover",
            "type" => "select",
            "props" => [
              "label" => "Object fit",
              "options" => $vAttributes["imageObject"]
            ]
          ],
          "imageBorderRadio" => [
            "name" => "imageBorderRadio",
            "value" => "0",
            "type" => "input",
            "props" => [
              "label" => "Redondeado del borde",
              "type" => "number"
            ]
          ],
          "imageBorderRadioType" => [
            "name" => "imageBorderRadioType",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Posición del redondeado del borde",
              "options" => $vAttributes["contentBorderRoundedType"]
            ]
          ],
          "imageBorderWidth" => [
            "name" => "imageBorderWidth",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "Ancho del Borde",
              "options" => $vAttributes["optionOneToFive"]
            ]
          ],
          "imageBorderStyle" => [
            "name" => "imageBorderStyle",
            "value" => "solid",
            "type" => "select",
            "props" => [
              "label" => "Estilo del Borde",
              "options" => $vAttributes["imageBorderStyle"]
            ]
          ],
          "imageBorderColor" => [
            "name" => "imageBorderColor",
            "type" => "inputColor",
            "props" => [
              "label" => "Color del Borde"
            ]
          ],
          "withImageOpacity" => [
            "name" => "withImageOpacity",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Opacidad",
              "options" => $vAttributes["validation"]
            ]
          ],
          "imageOpacityColor" => [
            "name" => "imageOpacityColor",
            "type" => "select",
            "props" => [
              "label" => "Color de Opacidad",
              "options" => $vAttributes["opacityColor"]
            ]
          ],
          "imageOpacityDirection" => [
            "name" => "imageOpacityDirection",
            "type" => "select",
            "props" => [
              "label" => "Dirección de Opacidad",
              "options" => $vAttributes["opacityDirection"]
            ]
          ]
        ]
      ]
    ]
  ],
  "carousel" => [
    "title" => "Carousel",
    "systemName" => "isite::carousel.owl-carousel",
    "nameSpace" => "Modules\Isite\View\Components\Carousel\OwlCarousel",
    "content" => [
      [
        "label" => "Iblog::Post",
        "value" => "Modules\Iblog\Repositories\PostRepository"
      ],
      [
        "label" => "Iblog::Category",
        "value" => "Modules\Iblog\Repositories\CategoryRepository"
      ],
      [
        "label" => "Icommerce::Category",
        "value" => "Modules\Icommerce\Repositories\CategoryRepository"
      ],
      [
        "label" => "Icommerce::Productos",
        "value" => "Modules\Icommerce\Repositories\ProductRepository"
      ],
      [
        "label" => "Slider::Slider",
        "value" => "Modules\Slider\Repositories\SlideRepository"
      ]
    ],
    "childBlocks" => [
      "itemComponentAttributes" => "isite::item-list",
      "productItemComponentAttributes" => "icommerce::components.product-list-item"
    ],
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "loop" => [
            "name" => "loop",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Loop",
              "options" => $vAttributes["validation"]
            ]
          ],
          "autoplay" => [
            "name" => "autoplay",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Repetición automática",
              "options" => $vAttributes["validation"]
            ]
          ],
          "center" => [
            "name" => "center",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "Center",
              "options" => $vAttributes["validation"]
            ]
          ],
          "autoplayHoverPause" => [
            "name" => "autoplayHoverPause",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Pausa en repetición automática",
              "options" => $vAttributes["validation"]
            ]
          ],
          "containerFluid" => [
            "name" => "containerFluid",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "Container fluid",
              "options" => $vAttributes["validation"]
            ]
          ],
          "margin" => [
            "name" => "margin",
            "value" => "10",
            "type" => "input",
            "props" => [
              "label" => "Margen",
              "type" => "number"
            ]
          ],
          "stagePadding" => [
            "name" => "stagePadding",
            "value" => "0",
            "type" => "input",
            "props" => [
              "label" => "Espaciado",
              "type" => "number"
            ]
          ],
          "autoplayTimeout" => [
            "name" => "autoplayTimeout",
            "value" => "5000",
            "type" => "input",
            "props" => [
              "label" => "Tiempo de espera del intervalo",
              "type" => "number"
            ]
          ],
          "itemsBySlide" => [
            "name" => "itemsBySlide",
            "value" => "1",
            "type" => "input",
            "props" => [
              "label" => "Elemendo por transición",
              "type" => "number"
            ]
          ],
          "responsiveClass" => [
            "name" => "responsiveClass",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Clase responsive",
              "options" => $vAttributes["validation"]
            ]
          ],
          "responsive" => [
            "name" => "responsive",
            "value" => [0 => ["items" => 1], 640 => ["items" => 2], 992 => ["items" => 4]],
            "type" => "json",
            'columns' => 'col-12',
            "props" => [
              "label" => "Responsive"
            ]
          ]
        ]
      ],
      "navydots" => [
        "title" => "Navegación (nav y dots)",
        "fields" => [
          "nav" => [
            "name" => "nav",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar (nav)",
              "options" => $vAttributes["validation"]
            ]
          ],
          "navPosition" => [
            "name" => "navPosition",
            "value" => "bottom",
            "type" => "select",
            "props" => [
              "label" => "Posición (nav)",
              "options" => $vAttributes["navPositionCarousel"]
            ]
          ],
          "navStyleButton" => [
            "name" => "navStyleButton",
            "type" => "select",
            "props" => [
              "label" => "Estilo de Borde (nav)",
              "options" => $vAttributes["buttonStyle"]
            ]
          ],
          "navSizeButton" => [
            "name" => "navSizeButton",
            "type" => "select",
            "props" => [
              "label" => "Espaciado (nav)",
              "options" => $vAttributes["buttonType"]
            ]
          ],
          "navColor" => [
            "name" => "navColor",
            "value" => "primary",
            "type" => "select",
            "props" => [
              "label" => "Color (nav)",
              "options" => $vAttributes["bgColor"]
            ]
          ],
          "navIcon" => [
            "name" => "navIcon",
            "value" => "arrow",
            "type" => "select",
            "props" => [
              "label" => "Icono de Flecha (nav)",
              "options" => $vAttributes["iconArrow"]
            ]
          ],
          "navSizeLabel" => [
            "name" => "navSizeLabel",
            "value" => "20",
            "type" => "input",
            "props" => [
              "label" => "Tamaño del texto (nav)",
              "type" => "number"
            ]
          ],
          "dots" => [
            "name" => "dots",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar (dots)",
              "options" => $vAttributes["validation"]
            ]
          ],
          "dotsStyle" => [
            "name" => "dotsStyle",
            "value" => "dots-linear",
            "type" => "select",
            "props" => [
              "label" => "Estilos (dots)",
              "options" => $vAttributes["dotStyle"]
            ]
          ]
        ]
      ],
      "texto" => [
        "title" => "Texto (Titulo y Subtitulo)",
        "fields" => [
          "title" => [
            "name" => "title",
            "type" => "input",
            "props" => [
              "label" => "Titulo",
            ]
          ],
          "subTitle" => [
            "name" => "subTitle",
            "type" => "input",
            "props" => [
              "label" => "Subtitulo",
            ]
          ],
          "owlTextAlign" => [
            "name" => "owlTextAlign",
            "value" => "text-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => $vAttributes["align"]
            ]
          ],
          "owlTextPosition" => [
            "name" => "owlTextPosition",
            "value" => "2",
            "type" => "select",
            "props" => [
              "label" => "Posición",
              "options" => [
                ["label" => "Solo título", "value" => "1"],
                ["label" => "Título con descripción abajo", "value" => "2"],
                ["label" => "Título abajo con descripción arriba", "value" => "3"]
              ]
            ]
          ],
          "owlTitleSize" => [
            "name" => "owlTitleSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Fuente (Titulo)",
              "type" => "number"
            ]
          ],
          "owlTitleTransform" => [
            "name" => "owlTitleTransform",
            "type" => "select",
            "props" => [
              "label" => "Transformar (Titulo)",
              "options" => $vAttributes["textTransform"]
            ]
          ],
          "owlTitleColor" => [
            "name" => "owlTitleColor",
            "type" => "select",
            "props" => [
              "label" => "Color (Titulo)",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "owlTitleMarginT" => [
            "name" => "owlTitleMarginT",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen superior (Titulo)",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "owlTitleMarginB" => [
            "name" => "owlTitleMarginB",
            "value" => "mb-0",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior (Titulo)",
              "options" => $vAttributes["marginB"]
            ]
          ],
          "owlTitleWeight" => [
            "name" => "owlTitleWeight",
            "value" => "font-weight-normal",
            "type" => "select",
            "props" => [
              "label" => "Negrita (Titulo)",
              "options" => $vAttributes["textWeight"]
            ]
          ],
          "owlTitleLetterSpacing" => [
            "name" => "owlTitleLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras (Titulo)",
              "type" => "number"
            ]
          ],
          "owlTitleVineta" => [
            "name" => "owlTitleVineta",
            "type" => "input",
            "props" => [
              "label" => "Icon (Titulo)"
            ]
          ],
          "owlTitleUrl" => [
            "name" => "owlTitleUrl",
            "type" => "input",
            "props" => [
              "label" => "Url (Titulo)"
            ]
          ],
          "owlTitleTarget" => [
            "name" => "owlTitleTarget",
            "value" => "_self",
            "type" => "select",
            "props" => [
              "label" => "Target (Titulo)",
              "options" => $vAttributes["target"]
            ]
          ],
          "owlTitleVinetaColor" => [
            "name" => "owlTitleVinetaColor",
            "type" => "select",
            "props" => [
              "label" => "Color icon (Titulo)",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "owlSubtitleSize" => [
            "name" => "owlSubtitleSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Fuente (Subtitulo)",
              "type" => "number"
            ]
          ],
          "owlSubtitleColor" => [
            "name" => "owlSubtitleColor",
            "type" => "select",
            "props" => [
              "label" => "Color (Subtitulo)",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "owlSubtitleMarginT" => [
            "name" => "owlSubtitleMarginT",
            "value" => "mt-0",
            "type" => "select",
            "props" => [
              "label" => "Margen superior (Subtitulo)",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "owlSubtitleMarginB" => [
            "name" => "owlSubtitleMarginB",
            "value" => "mb-0",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior (Subtitulo)",
              "options" => $vAttributes["marginB"]
            ]
          ],
          "owlSubtitleTransform" => [
            "name" => "owlSubtitleTransform",
            "type" => "select",
            "props" => [
              "label" => "Transformar (Subtitulo)",
              "options" => $vAttributes["textTransform"]
            ]
          ],
          "owlSubtitleWeight" => [
            "name" => "owlSubtitleWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita (Subtitulo)",
              "options" => $vAttributes["textWeight"]
            ]
          ],
          "owlSubtitleLetterSpacing" => [
            "name" => "owlSubtitleLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras (Subtitulo)",
              "type" => "number"
            ]
          ],
        ]
      ]
    ]
  ],
  "itemsList" => [
    "title" => "Lista de Elementos",
    "systemName" => "isite::items-list",
    "nameSpace" => "livewire",
    "content" => [
      [
        "label" => "Post",
        "value" => "Modules\Iblog\Entities\Post"
      ],
      [
        "label" => "Category",
        "value" => "Modules\Iblog\Entities\Category"
      ]
    ],
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "title" => [
            "name" => "title",
            "type" => "input",
            "props" => [
              "label" => "titulo"
            ]
          ],
          "itemListLayout" => [
            "name" => "itemListLayout",
            "type" => "input",
            "props" => [
              "label" => "layout del item list"
            ]
          ],
          "params" => [
            "name" => "params",
            "value" => [],
            "type" => "json",
            "props" => [
              "label" => "parametros del itemsList"
            ]
          ],
          "viewMoreButtonLabel" => [
            "name" => "viewMoreButtonLabel",
            "value" => "isite::common.menu.viewMore",
            "type" => "input",
            "props" => [
              "label" => "ver boton del label"
            ]
          ],
          "responsiveTopContent" => [
            "name" => "responsiveTopContent",
            "value" => ["mobile" => true, "desktop" => true, "order" => true],
            "type" => "json",
            "props" => [
              "label" => "contenido responsivo"
            ]
          ],
          "withUser" => [
            "name" => "withUser",
            "value" => false,
            "type" => "select",
            "props" => [
              "label" => "con usuario",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "showTitle" => [
            "name" => "showTitle",
            "value" => true,
            "type" => "select",
            "props" => [
              "label" => "mostrar titulo",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "pagination" => [
            "name" => "pagination",
            "value" => ["show" => true, "type" => "normal"],
            "type" => "json",
            "props" => [
              "label" => "paginación"
            ]
          ],
          "configOrderBy" => [
            "name" => "configOrderBy",
            "type" => "input",
            "props" => [
              "label" => "orden de configuración por"
            ]
          ],
          "configLayoutIndex" => [
            "name" => "configLayoutIndex",
            "type" => "input",
            "props" => [
              "label" => "configuración del layout"
            ]
          ],
          "itemModal" => [
            "name" => "itemModal",
            "value" => ["mobile" => false, "desktop" => false, "idModal" => 'modal_1'],
            "type" => "json",
            "props" => [
              "label" => "item modal"
            ]
          ],
          "carouselAttributes" => [
            "name" => "carouselAttributes",
            "type" => "json",
            "props" => [
              "label" => "atributos del carrusel"
            ]
          ],
          "uniqueItemListRendered" => [
            "name" => "uniqueItemListRendered",
            "value" => false,
            "type" => "select",
            "props" => [
              "label" => "renderizar un unico item list",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "description" => [
            "name" => "description",
            "value" => null,
            "type" => "input",
            "props" => [
              "label" => "descripción"
            ]
          ],
          "disableFilters" => [
            "name" => "disableFilters",
            "value" => false,
            "type" => "select",
            "props" => [
              "label" => "desabilitar filtros",
              "options" => $vAttributes["booleanValidation"]
            ]
          ]
        ]
      ]
    ]
  ],
  "infoContact" => [
    "title" => "Información De Contacto",
    "systemName" => "isite::InfoContact",
    "nameSpace" => "Modules\Isite\View\Components\InfoContact",
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "layout" => [
            "name" => "layout",
            "value" => "info-contact-layout-1",
            "type" => "select",
            "props" => [
              "label" => "Plantilla Para Información De Contacto",
              "options" => [
                ["label" => "Información De Contacto Plantilla 1", "value" => "info-contact-layout-1"],
              ]
            ]
          ],
          "withTitle" => [
            "name" => "withTitle",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Titulo",
              "options" => $vAttributes["validation"]
            ]
          ],
          "title" => [
            "name" => "title",
            "type" => "input",
            "props" => [
              "label" => "titulo"
            ]
          ],
          "AlainTitle" => [
            "name" => "AlainTitle",
            "value" => "text-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación del titulo",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "text-left"],
                ["label" => "Alineación a la Derecha", "value" => "text-right"],
                ["label" => "Alineación Centrado", "value" => "text-center"],
              ]
            ]
          ],
          "withSubtitle" => [
            "name" => "withSubtitle",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Subtitulo",
              "options" => $vAttributes["validation"]
            ]
          ],
          "subtitle" => [
            "name" => "subtitle",
            "type" => "input",
            "props" => [
              "label" => "subtitle"
            ]
          ],
          "AlainSubtitle" => [
            "name" => "AlainSubtitle",
            "value" => "text-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación del subtitulo",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "text-left"],
                ["label" => "Alineación a la Derecha", "value" => "text-right"],
                ["label" => "Alineación Centrado", "value" => "text-center"],
              ]
            ]
          ],
          "AlainIcons" => [
            "name" => "AlainIcons",
            "value" => "justify-content-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación Iconos Personalizados",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "justify-content-left"],
                ["label" => "Alineación a la Derecha", "value" => "justify-content-right"],
                ["label" => "Alineación Centrado", "value" => "justify-content-center"],
              ]
            ]
          ],
          "AlainInfoContact" => [
            "name" => "AlainInfoContact",
            "value" => "justify-content-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación Información",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "justify-content-left"],
                ["label" => "Alineación a la Derecha", "value" => "justify-content-right"],
                ["label" => "Alineación Centrado", "value" => "justify-content-center"],
              ]
            ]
          ],
          "AlainTitleInfoContact" => [
            "name" => "AlainTitleInfoContact",
            "value" => "justify-content-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación Titulo Información",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "justify-content-left"],
                ["label" => "Alineación a la Derecha", "value" => "justify-content-right"],
                ["label" => "Alineación Centrado", "value" => "justify-content-center"],
              ]
            ]
          ],
          "orderInfo" => [
            "name" => "orderInfo",
            "value" => ["phone" => "order-0", "address" => "order-1", "email" => "order-2", "socialNetworks" => "order-3"],
            "type" => "json",
            "columns" => "col-12",
            "props" => [
              "label" => "Orden de los elementos"
            ]
          ],
          "container" => [
            "name" => "container",
            "value" => "container",
            "type" => "select",
            "props" => [
              "label" => "Tipo de contenedor",
              "options" => $vAttributes["containers"]
            ]
          ],
          "contentPaddingY" => [
            "name" => "contentPaddingY",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Padding en Eje Y Bloque Información",
              "options" => [
                ["label" => "Sin Padding", "value" => ""],
                ["label" => "Padding de 1 Pixel", "value" => "py-1"],
                ["label" => "Padding de 2 Pixel", "value" => "py-2"],
                ["label" => "Padding de 3 Pixel", "value" => "py-3"],
                ["label" => "Padding de 4 Pixel", "value" => "py-4"],
                ["label" => "Padding de 5 Pixel", "value" => "py-5"],
              ]
            ]
          ],
          "contentPaddingX" => [
            "name" => "contentPaddingX",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Padding en Eje X Bloque Información",
              "options" => [
                ["label" => "Sin Padding", "value" => ""],
                ["label" => "Padding de 1 Pixel", "value" => "px-1"],
                ["label" => "Padding de 2 Pixel", "value" => "px-2"],
                ["label" => "Padding de 3 Pixel", "value" => "px-3"],
                ["label" => "Padding de 4 Pixel", "value" => "px-4"],
                ["label" => "Padding de 5 Pixel", "value" => "px-5"],
              ]
            ]
          ],
          "contentMarginY" => [
            "name" => "contentMarginY",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Margin en Eje Y Bloque Información",
              "options" => [
                ["label" => "Sin Margin", "value" => ""],
                ["label" => "Margin de 1 Pixel", "value" => "my-1"],
                ["label" => "Margin de 2 Pixel", "value" => "my-2"],
                ["label" => "Margin de 3 Pixel", "value" => "my-3"],
                ["label" => "Margin de 4 Pixel", "value" => "my-4"],
                ["label" => "Margin de 5 Pixel", "value" => "my-5"],
              ]
            ]
          ],
          "contentMarginX" => [
            "name" => "contentMarginX",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Margin en Eje X Bloque Información",
              "options" => [
                ["label" => "Sin Margin", "value" => ""],
                ["label" => "Margin de 1 Pixel", "value" => "mx-1"],
                ["label" => "Margin de 2 Pixel", "value" => "mx-2"],
                ["label" => "Margin de 3 Pixel", "value" => "mx-3"],
                ["label" => "Margin de 4 Pixel", "value" => "mx-4"],
                ["label" => "Margin de 5 Pixel", "value" => "mx-5"],
              ]
            ]
          ],
          "contentBorderType" => [
            "name" => "contentBorderType",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Tipo de Borde Bloque Información",
              "options" => [
                ["label" => "Sin Borde", "value" => ""],
                ["label" => "Borde Completo", "value" => "border"],
                ["label" => "Borde Arriba", "value" => "border-top"],
                ["label" => "Borde Derecha", "value" => "border-right"],
                ["label" => "Borde Abajo", "value" => "border-bottom"],
                ["label" => "Borde Izquierda", "value" => "border-left"],
              ]
            ]
          ],
          "contentBorder" => [
            "name" => "contentBorder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Grosor del Borde Bloque Información",
              "options" => [
                ["label" => "0", "value" => "0"],
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
              "label" => "Color Del Borde Bloque Información"
            ]
          ],
          "fontSizeTitleSection" => [
            "name" => "fontSizeTitleSection",
            "type" => "input",
            "props" => [
              "label" => "Tamaño de fuente Titulo Principal",
              "type" => "number"
            ]
          ],
          "colorTitleSection" => [
            "name" => "colorTitleSection",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Titulo Principal"
            ]
          ],
          "fontSizeSubtitleSection" => [
            "name" => "fontSizeTitleSection",
            "type" => "input",
            "props" => [
              "label" => "Tamaño de fuente Titulo Principal",
              "type" => "number"
            ]
          ],
          "colorSubtitleSection" => [
            "name" => "colorTitleSection",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Titulo Principal"
            ]
          ],
          "fontSizeTitleContact" => [
            "name" => "fontSizeTitleContact",
            "type" => "input",
            "props" => [
              "label" => "Tamaño de fuente Titulo Información",
              "type" => "number"
            ]
          ],
          "colorTitleContact" => [
            "name" => "colorTitleContact",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Titulo Información"
            ]
          ],
          "fontSizeIcons" => [
            "name" => "fontSizeIcons",
            "type" => "input",
            "props" => [
              "label" => "Tamaño de fuente Iconos",
              "type" => "number"
            ]
          ],
          "colorIcons" => [
            "name" => "colorTitleContact",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Iconos"
            ]
          ],
        ]
      ],
      "phone" => [
        "title" => "Sección Teléfono",
        "fields" => [
          "withPhone" => [
            "name" => "withPhone",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Teléfono",
              "options" => $vAttributes["validation"]
            ]
          ],
          "withTitlePhone" => [
            "name" => "withTitlePhone",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Titulo Teléfono",
              "options" => $vAttributes["validation"]
            ]
          ],
          "titlePhone" => [
            "name" => "titlePhone",
            "type" => "input",
            "props" => [
              "label" => "Titulo Teléfono"
            ]
          ],
          "withIconCustomPhone" => [
            "name" => "withIconCustomPhone",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Icono Personalizado",
              "options" => $vAttributes["validation"]
            ]
          ],
          "iconCustomPhone" => [
            "name" => "iconCustomPhone",
            "type" => "input",
            "props" => [
              "label" => "Icono Personalizado Teléfono"
            ]
          ],
          "withIconComponentPhone" => [
            "name" => "withIconComponentPhone",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Icono Componente",
              "options" => $vAttributes["validation"]
            ]
          ],
        ]
      ],
      "address" => [
        "title" => "Sección Dirección",
        "fields" => [
          "withAddress" => [
            "name" => "withAddress",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Dirección",
              "options" => $vAttributes["validation"]
            ]
          ],
          "withTitleAddress" => [
            "name" => "withTitleAddress",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Titulo Dirección",
              "options" => $vAttributes["validation"]
            ]
          ],
          "titleAddress" => [
            "name" => "titleAddress",
            "type" => "input",
            "props" => [
              "label" => "Titulo Dirección"
            ]
          ],
          "withIconCustomAddress" => [
            "name" => "withIconCustomAddress",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Icono Personalizado",
              "options" => $vAttributes["validation"]
            ]
          ],
          "iconCustomAddress" => [
            "name" => "iconCustomAddress",
            "type" => "input",
            "props" => [
              "label" => "Icono Personalizado Dirección"
            ]
          ],
          "withIconComponentAddress" => [
            "name" => "withIconComponentAddress",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Icono Componente",
              "options" => $vAttributes["validation"]
            ]
          ],
        ]
      ],
      "email" => [
        "title" => "Sección Correo Electrónico",
        "fields" => [
          "withEmail" => [
            "name" => "withEmail",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Correo Electrónico",
              "options" => $vAttributes["validation"]
            ]
          ],
          "withTitleEmail" => [
            "name" => "withTitleEmail",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Titulo Correo Electrónico",
              "options" => $vAttributes["validation"]
            ]
          ],
          "titleEmail" => [
            "name" => "titleEmail",
            "type" => "input",
            "props" => [
              "label" => "Titulo Correo Electrónico"
            ]
          ],
          "withIconCustomEmail" => [
            "name" => "withIconCustomEmail",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Icono Personalizado",
              "options" => $vAttributes["validation"]
            ]
          ],
          "iconCustomEmail" => [
            "name" => "iconCustomEmail",
            "type" => "input",
            "props" => [
              "label" => "Icono Personalizado Correo Electrónico"
            ]
          ],
          "withIconComponentEmail" => [
            "name" => "withIconComponentEmail",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Icono Componente",
              "options" => $vAttributes["validation"]
            ]
          ],
        ]
      ],
      "socialNetworks" => [
        "title" => "Sección Redes Sociales",
        "fields" => [
          "withSocialNetworks" => [
            "name" => "withSocialNetworks",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Redes Sociales",
              "options" => $vAttributes["validation"]
            ]
          ],
          "layoutSocialNetwork" => [
            "name" => "layoutSocialNetwork",
            "value" => "social-layout-1",
            "type" => "select",
            "props" => [
              "label" => "Plantilla Para Redes Sociales",
              "options" => [
                ["label" => "Redes Sociales Plantilla 1", "value" => "social-layout-1"],
              ]
            ]
          ],
          "alainSocialNetwork" => [
            "name" => "alainSocialNetwork",
            "value" => "justify-content-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación Redes Sociales",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "justify-content-left"],
                ["label" => "Alineación a la Derecha", "value" => "justify-content-right"],
                ["label" => "Alineación Centrado", "value" => "justify-content-center"],
              ]
            ]
          ],
        ]
      ],
    ]
  ],
];
