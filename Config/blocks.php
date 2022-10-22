<?php

return [
  "isiteItem" => [
    "systemName" => "isite_item",
    "title" => "Elemento",
    "sections" => [
      "general" => [
        "title" => "Genera",
        "fields" => [
          "layout" => [
            "name" => "layout",
            "value" => "item-list-layout-6",
            "type" => "select",
            "group" => "Estructura",
            "props" => [
              "options" => [
                ["label" => "Layout 7 (Contenido Individual Vertical)", "value" => "item-list-layout-6"],
                ["label" => "Layout 7 (Textos - Imagenes)", "value" => "item-list-layout-7"]
              ]
            ]
          ],
          "contentPadding" => [
            "name" => "contentPadding",
            "group" => "Espacio",
            "type" => "input",
            "props" => [
              "label" => "Externo",
              "type" => "number"
            ]
          ],
          "itemMarginB" => [
            "name" => "itemMarginB",
            "value" => "",
            "group" => "Margen",
            "type" => "select",
            "props" => [
              "label" => "Inferior",
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
          "itemBackgroundColor" => [
            "name" => "itemBackgroundColor",
            "group" => "Fondo",
            "type" => "inputColor",
            "props" => [
              "label" => "Color"
            ]
          ],
          "itemBackgroundColorHover" => [
            "name" => "itemBackgroundColorHover",
            "group" => "Fondo",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Hover"
            ]
          ],
        ]
      ],
      "imagen" => [
        "title" => "Imágen",
        "fields" => [
          "withImage" => [
            "name" => "withImage",
            "value" => "1",
            "group" => "General",
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
            "value" => "mainimage",
            "group" => "General",
            "type" => "select",
            "props" => [
              "label" => "Tipo",
              "options" => [
                ["label" => "Principal", "value" => "mainimage"],
                ["label" => "Secundaria", "value" => "secondaryimage"]
              ]
            ]
          ],
          "imagePadding" => [
            "name" => "imagePadding",
            "group" => "Aspecto",
            "props" => [
              "label" => "Espaciado antes del borde",
              "type" => "number"
            ]
          ],
          "imagePicturePadding" => [
            "name" => "imagePicturePadding",
            "group" => "Aspecto",
            "props" => [
              "label" => "Espaciado luego del borde",
              "type" => "number"
            ]
          ]
        ]
      ]
    ]
  ],
  "isiteSlider" => [
    "systemName" => "isite_slider",
    "title" => "slider",
    "childBlocks" => [
      "item" => "isite_item"
    ],
    "sections" => [
      "imagen" => [
        "title" => "Imágen",
        "fields" => [
          "withImage" => [
            "name" => "withImage",
            "value" => "1",
            "group" => "General",
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
            "value" => "mainimage",
            "group" => "General",
            "type" => "select",
            "props" => [
              "label" => "Tipo",
              "options" => [
                ["label" => "Principal", "value" => "mainimage"],
                ["label" => "Secundaria", "value" => "secondaryimage"]
              ]
            ]
          ],
          "imagePadding" => [
            "name" => "imagePadding",
            "group" => "Aspecto",
            "props" => [
              "label" => "Espaciado antes del borde",
              "type" => "number"
            ]
          ],
          "imagePicturePadding" => [
            "name" => "imagePicturePadding",
            "group" => "Aspecto",
            "props" => [
              "label" => "Espaciado luego del borde",
              "type" => "number"
            ]
          ]
        ]
      ]
    ]
  ],
];
