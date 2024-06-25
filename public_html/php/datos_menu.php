<?php

$menu = [
    [
        'title' => 'Lomo Saltado',
        'src' => "assets/img/lomo_saltado.png",
        'alt' => 'Lomo Saltado',
        'description' => 'Delicioso plato peruano que combina tiernos trozos de lomo
        de res con cebolla, tomate y papas fritas',
        'stars' => 5,
        'id' => 1,
        'price' => 26.00,
        'amount' => 1,
        'type' => 'Principal'
    ],
    [
        'title' => 'Ensalada César',
        'src' => "assets/img/ensalada_cesar.png",
        'alt' => 'Ensalada César',
        'description' => 'Clásica ensalada con lechuga romana, crutones, queso parmesano y aderezo César.',
        'stars' => 4,
        'id' => 2,
        'price' => 15.00,
        'amount' => 1,
        'type' => 'Ensalada'
    ],
    [
        'title' => 'Causa Limeña',
        'src' => "assets/img/causa.png",
        'alt' => 'Causa Limeña',
        'description' => 'Puré de papas sazonado con ají amarillo y relleno de pollo, atún o mariscos.',
        'stars' => 5,
        'id' => 3,
        'price' => 12.00,
        'amount' => 1,
        'type' => 'Aperitivo'
    ],
    [
        'title' => 'Chicha Morada',
        'src' => "assets/img/chicha_morada.webp",
        'alt' => 'Chicha Morada',
        'description' => 'Refrescante bebida peruana hecha de maíz morado, piña, manzana y especias.',
        'stars' => 4,
        'id' => 4,
        'price' => 8.00,
        'amount' => 1,
        'type' => 'Bebida'
    ],
    [
        'title' => 'Suspiro a la Limeña',
        'src' => "assets/img/suspiro.gif",
        'alt' => 'Suspiro a la Limeña',
        'description' => 'Delicioso postre peruano hecho de leche condensada, azúcar, yemas de huevo y merengue.',
        'stars' => 5,
        'id' => 5,
        'price' => 10.00,
        'amount' => 1,
        'type' => 'Postre'
    ],
    [
        'title' => 'Seco de Cordero',
        'src' => "assets/img/seco.png",
        'alt' => 'Seco de Cordero',
        'description' => 'Guiso de cordero cocido lentamente con cilantro, ají amarillo y cerveza.',
        'stars' => 4,
        'id' => 6,
        'price' => 29.00,
        'amount' => 1,
        'type' => 'Principal'
    ],
    [
        'title' => 'Ensalada de Quinoa',
        'src' => "assets/img/ensalada_quinoa.png",
        'alt' => 'Ensalada de Quinoa',
        'description' => 'Ensalada nutritiva con quinoa, tomates cherry, pepino, y vinagreta de limón.',
        'stars' => 5,
        'id' => 7,
        'price' => 23.00,
        'amount' => 1,
        'type' => 'Ensalada'
    ],
    [
        'title' => 'Anticuchos',
        'src' => "assets/img/anticucho.png",
        'alt' => 'Anticuchos',
        'description' => 'Brochetas de corazón de res marinadas en ají panca y especias, servidas con papas doradas.',
        'stars' => 5,
        'id' => 8,
        'price' => 14.00,
        'amount' => 1,
        'type' => 'Aperitivo'
    ],
    [
        'title' => 'Pisco Sour',
        'src' => "assets/img/pisco_sour.png",
        'alt' => 'Pisco Sour',
        'description' => 'Cóctel clásico peruano hecho con pisco, jugo de limón, jarabe de goma, clara de huevo y amargo de angostura.',
        'stars' => 5,
        'id' => 9,
        'price' => 13.00,
        'amount' => 1,
        'type' => 'Bebida'
    ],
    [
        'title' => 'Turrón de Doña Pepa',
        'src' => "assets/img/turron.png",
        'alt' => 'Turrón de Doña Pepa',
        'description' => 'Dulce tradicional hecho con barras de harina de trigo, bañadas en miel de chancaca y decoradas con caramelos.',
        'stars' => 4,
        'id' => 10,
        'price' => 9.00,
        'amount' => 1,
        'type' => 'Postre'
    ],
];

echo json_encode($menu);
?>