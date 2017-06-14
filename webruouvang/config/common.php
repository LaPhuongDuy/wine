<?php
return [
    'storage' => [
        'product' => 'images/product/',
        'user' => 'images/user/',
        'brand' => 'images/brand/',
        'category' => 'images/category/',
    ],
    'number' => [
        'paginate_category' => '6',
        'bestseller' => '10',
        'latest_product' => '5',
        'age_old_product' => '7',
        'old_product' => '10',
    ],

    'priceFilter' => [
        0 => [
            'low' => [
                'title' => '$0.00 - ',
                'value' => '0.00',
            ],
            'high' => [
                'title' => '$399.99',
                'value' => '399.99',
            ],
        ],
        1 => [
            'low' => [
                'title' => '$400.00 - ',
                'value' => '400.00',
            ],
            'high' => [
                'title' => 'and above',
                'value' => '-1',
            ],
        ],
        2 => [
            'low' => [
                'title' => 'All product',
                'value' => '0.00',
            ],
            'high' => [
                'title' => '',
                'value' => '-1',
            ],
        ],
    ],
];
