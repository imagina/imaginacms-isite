<?php

$vAttributes = config("asgard.isite.standardValuesForBlocksAttributes");

return [
  "block" => [
    "title" => "Bloque",
    "systemName" => "x-isite::block",
    "nameSpace" => "Modules\Isite\View\Components\Block",
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
          ],
          "container" => [
            "name" => "container",
            "value" => "container",
            "type" => "select",
            "props" => [
              "label" => "tipo de contenedor",
              "options" => [
                ["label" => "container-fluid", "value" => "container-fluid"],
                ["label" => "container", "value" => "container"]
              ]
            ]
          ],
          "id" => [
            "name" => "id",
            "type" => "input",
            "props" => [
              "label" => "Ingresar el id",
              "type" => "text"
            ]
          ],
          "columns" => [
            "name" => "columns",
            "type" => "input",
            "props" => [
              "label" => "columnas",
              "type" => "number"
            ]
          ],
          "borderForm" => [
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
              "options" => [
                ["label" => "none", "value" => "none"],
                ["label" => "inline", "value" => "inline"],
                ["label" => "inline-block", "value" => "inline-block"],
                ["label" => "block", "value" => "block"],
                ["label" => "table", "value" => "table"],
                ["label" => "table-cell", "value" => "table-cell"],
                ["label" => "table-row", "value" => "table-row"],
                ["label" => "flex", "value" => "flex"],
                ["label" => "inline-flex", "value" => "inline-flex"],
              ]
            ]
          ],
          "widthContainer" => [
            "name" => "widthContainer",
            "type" => "input",
            "props" => [
              "label" => "width container",
              "type" => "number"
            ]
          ],
          "heightContainer" => [
            "name" => "heightContainer",
            "type" => "input",
            "props" => [
              "label" => "width container",
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
          "overlay" => [
            "name" => "overlay",
            "value" => "false",
            "type" => "input",
            "props" => [
              "label" => "display container",
              "options" => [
                ["label" => "false", "value" => "false"],
                ["label" => "true", "value" => "true"]
              ]
            ]
          ],
          "backgroundColor" => [
            "name" => "backgroundColor",
            "type" => "inputColor",
            "props" => [
              "label" => "color"
            ]
          ],
        ]
      ]
    ]
  ],
  "isiteItem" => [
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
              "options" => $vAttributes["marginX"]
            ]
          ],
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
              "options" => $vAttributes["marginT"]
            ]
          ],
          "titleColor" => [
            "name" => "titleColor",
            "type" => "select",
            "props" => [
              "label" => "Tamaño Fuente",
              "options" => $vAttributes["textColors"]
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
              "options" => $vAttributes["TextWeight"]
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
              "options" => $vAttributes["textDecoration"]
            ]
          ],
          "titleOrder" => [
            "name" => "titleOrder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Orden",
              "options" => $vAttributes["optionOneToFive"]
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
              "options" => $vAttributes["textColors"]
            ]
          ],
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
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "summaryMarginB" => [
            "name" => "summaryMarginB",
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
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["textDecoration"]
            ]
          ],
          "summaryTextWeight" => [
            "name" => "summaryTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => $vAttributes["TextWeight"]
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
              "options" => $vAttributes["optionOneToFive"]
            ]
          ],
          "withCategory" => [
            "name" => "withViewMoreButton",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => $vAttributes["validation"]
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
            "type" => "select",
            "props" => [
              "label" => "Decoración de texto",
              "options" => $vAttributes["textDecoration"]
            ]
          ],
          "categoryTextWeight" => [
            "name" => "categoryTextWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => $vAttributes["TextWeight"]
            ]
          ],
          "categoryOrder" => [
            "name" => "categoryOrder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Orden",
              "options" => $vAttributes["optionOneToFive"]
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
                ["label" => $vAttributes["validation"]
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
                  "options" => $vAttributes["TextWeight"]
                ]
              ],
              "createdDateTextDecoration" => [
                "name" => "createdDateTextDecoration",
                "type" => "select",
                "props" => [
                  "label" => "Negrita",
                  "options" => $vAttributes["textDecoration"]
                ]
              ],
              "createdDateOrder" => [
                "name" => "createdDateOrder",
                "value" => "1",
                "type" => "select",
                "props" => [
                  "label" => "Orden",
                  "options" => $vAttributes["optionOneToFive"]
                ]
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
            "value" => "mt-0",
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
          "buttonOrder" => [
            "name" => "buttonOrder",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Orden",
              "options" => $vAttributes["optionOneToFive"]
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
            "value" => "100%",
            "type" => "input",
            "props" => [
              "label" => "Tamaño imagen",
            ]
          ],
          "imageAlign" => [
            "name" => "imageAlign",
            "type" => "select",
            "props" => [
              "label" => "Alineación de la imagen",
              "options" => $vAttributes["align"]
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
              "options" => $vAttributes["contentBorderRoundedType"]
            ]
          ],
          "imageBorderWidth" => [
            "name" => "imageBorderWidth",
            "type" => "select",
            "props" => [
              "label" => "Ancho",
              "options" => $vAttributes["optionOneToFive"]
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
              "options" => $vAttributes["validation"]
            ]
          ],
          "imageOpacityColor" => [
            "name" => "imageOpacityColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["opacityColor"]
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
    ],
  ],
  "isiteCarousel" => [
    "title" => "Carousel",
    "systemName" => "isite::carousel.owl-carousel",
    "nameSpace" => "Modules\Isite\View\Components\Carousel\OwlCarousel",
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
    "childBlocks" => [
      "itemComponentAttributes" => "isite::item-list"
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
              "label" => "loop",
              "options" => $vAttributes["validation"]
            ]
          ],
          "autoplay" => [
            "name" => "autoplay",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Autoplay",
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
              "label" => "AutoplayHoverPause",
              "options" => $vAttributes["validation"]
            ]
          ],
          "ContainerFluid" => [
            "name" => "ContainerFluid",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "ContainerFluid",
              "options" => $vAttributes["validation"]
            ]
          ],
          "Margin" => [
            "name" => "Margin",
            "type" => "input",
            "props" => [
              "label" => "1",
              "type" => "number"
            ]
          ],
          "responsive" => [
            "name" => "responsive",
            "type" => "input",
            "props" => [
              "label" => "Responsive"
            ]
          ]
        ]
      ],
      "navydots" => [
        "title" => "navydots",
        "fields" => [
          "nav" => [
            "name" => "nav",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "navPosition" => [
            "name" => "navPosition",
            "type" => "select",
            "props" => [
              "label" => "Posicion",
              "options" => [
                ["label" => "Laterales", "value" => "center"],
                ["label" => "Superior derecha", "value" => "top-right"],
                ["label" => "Superior izquierda", "value" => "top-left"],
                ["label" => "Inferior centrado", "value" => "bottom"],
                ["label" => "Superior centrado", "value" => "top-center"]
              ]
            ]
          ],
          "navStyleButton" => [
            "name" => "navStyleButton",
            "type" => "select",
            "props" => [
              "label" => "Estilo de Borde",
              "options" => $vAttributes["buttonStyle"]
            ]
          ],
          "navSizeButton" => [
            "name" => "navSizeButton",
            "type" => "select",
            "props" => [
              "label" => "Espaciado",
              "options" => $vAttributes["buttonType"]
            ]
          ],
          "navColor" => [
            "name" => "navColor",
            "type" => "select",
            "props" => [
              "label" => "color",
              "options" => $vAttributes["bgColor"]
            ]
          ],
          "navIcon" => [
            "name" => "navIcon",
            "type" => "select",
            "props" => [
              "label" => "Nombre",
              "options" => [
                ["label" => "arrow", "value" => "arrow"],
                ["label" => "arrow-circle", "value" => "arrow-circle"],
                ["label" => "angle", "value" => "angle"],
                ["label" => "angle-double", "value" => "angle-double"],
                ["label" => "chevron", "value" => "chevron"],
                ["label" => "chevron-circle", "value" => "chevron-circle"],
                ["label" => "caret", "value" => "caret"],
                ["label" => "long-arrow", "value" => "long-arrow"],
                ["label" => "caret-square-o", "value" => "caret-square-o"]
              ]
            ]
          ],
          "navSizeLabel" => [
            "name" => "navSizeLabel",
            "type" => "input",
            "props" => [
              "label" => "Tamano",
              "type" => "number"
            ]
          ],
          "dots" => [
            "name" => "dots",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "dotsStyle" => [
            "name" => "dotsStyle",
            "type" => "select",
            "props" => [
              "label" => "Estilos",
              "options" => [
                ["label" => "dots-linear", "value" => "Barras"],
                ["label" => "dots-circle", "value" => "Circulos"],
              ]
            ]
          ]
        ]
      ],
      "texto" => [
        "title" => "texto",
        "fields" => [
          "owlTextAlign" => [
            "name" => "owlTextAlign",
            "type" => "select",
            "props" => [
              "label" => "alineacion",
              "options" => $vAttributes["align"]
            ]
          ],
          "owlTextPosition" => [
            "name" => "owlTextPosition",
            "type" => "select",
            "props" => [
              "label" => "Posicion",
              "options" => [
                ["label" => "Solo título", "value" => "1"],
                ["label" => "Título con descripción abajo", "value" => "2"],
                ["label" => "Título abajo con descripción arriba", "value" => "3"]
              ]
            ]
          ],
          "owlTitleSize" => [
            "name" => "owlTitleSize",
            "type" => "select",
            "props" => [
              "label" => "Tamaño",
              "type" => "number"
            ]
          ],
          "owlTitleTransform" => [
            "name" => "owlTitleTransform",
            "type" => "select",
            "props" => [
              "label" => "Transformar",
              "options" => [
                ["label" => "Mayuscula", "value" => "text-uppercase"],
                ["label" => "Minuscula", "value" => "text-lowercase"],
                ["label" => "Letra capital", "value" => "text-capitalize"]
              ]
            ]
          ],
          "owlTitleColor" => [
            "name" => "owlTitleColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "owlTitleColor2" => [
            "name" => "owlTitleColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "owlTitleMarginT" => [
            "name" => "owlTitleMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "owlTitleMarginB" => [
            "name" => "owlTitleMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => $vAttributes["marginB"]
            ]
          ],
          "owlTitleWeight" => [
            "name" => "owlTitleWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => $vAttributes["TextWeight"]
            ]
          ],
          "owlTitleLetterSpacing" => [
            "name" => "owlTitleLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras",
              "type" => "number"
            ]
          ],
          "owlTitleVineta" => [
            "name" => "owlTitleVineta",
            "type" => "input",
            "props" => [
              "label" => "Icon"
            ]
          ],
          "titleVinetaColor" => [
            "name" => "titleVinetaColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "owlSubtitleSize" => [
            "name" => "owlSubtitleSize",
            "type" => "input",
            "props" => [
              "label" => "Tamaño Fuente",
              "type" => "number"
            ]
          ],
          "owlSubtitleColor" => [
            "name" => "owlSubtitleColor",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["textColors"]
            ]
          ],
          "owlTitleMarginT" => [
            "name" => "owlTitleMarginT",
            "type" => "select",
            "props" => [
              "label" => "Margen superior",
              "options" => $vAttributes["marginT"]
            ]
          ],
          "owlTitleMarginB" => [
            "name" => "owlTitleMarginB",
            "type" => "select",
            "props" => [
              "label" => "Margen inferior",
              "options" => $vAttributes["marginB"]
            ]
          ],
          "owlSubtitleWeight" => [
            "name" => "owlSubtitleWeight",
            "type" => "select",
            "props" => [
              "label" => "Negrita",
              "options" => $vAttributes["TextWeight"]
            ]
          ],
          "owlSubtitleLetterSpacing" => [
            "name" => "owlSubtitleLetterSpacing",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre letras",
              "type" => "number"
            ]
          ]
        ]
      ]
    ]
  ]
];
