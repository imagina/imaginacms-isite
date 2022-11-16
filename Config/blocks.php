<?php

$vAttributes = config("asgard.isite.standardValuesForBlocksAttributes");

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
                            "options" => $vAttributes["containers"]
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
                        "value" => "16",
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
                            "options" => $vAttributes["imageAspect"]
                        ]
                    ],
                    "imageObject" => [
                        "name" => "imageObject",
                        "type" => "select",
                        "props" => [
                            "label" => "object-fit",
                            "options" => $vAttributes["imageObject"]
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
                            "options" => $vAttributes["imageBorderStyle"]
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
        ]
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
                        "value" => "arrow",
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
                        "value" => "false",
                        "type" => "select",
                        "props" => [
                            "label" => "con usuario",
                            "options" => $vAttributes["booleanValidation"]
                        ]
                    ],
                    "showTitle" => [
                        "name" => "showTitle",
                        "value" => "true",
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
                        "value" => "false",
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
                        "value" => "false",
                        "type" => "select",
                        "props" => [
                            "label" => "desabilitar filtros",
                            "options" => $vAttributes["booleanValidation"]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
