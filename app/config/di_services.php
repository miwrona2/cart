<?php

$di->setShared('ProductRepository', [
    'className' => \App\Models\Repositories\ProductRepository::class
]);

$di->setShared('CartRepository', [
    'className' => \App\Models\Repositories\CartRepository::class
]);

$di->setShared('CartItemRepository', [
    'className' => \App\Models\Repositories\CartItemRepository::class
]);

$di->setShared('ProductService', [
    'className' => \App\Models\Services\ProductService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'ProductRepository',
        ],
    ]
]);

$di->setShared('CartService', [
    'className' => \App\Models\Services\CartService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'CartRepository',
        ],
    ]
]);

$di->setShared('CartService', [
    'className' => \App\Models\Services\CartService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'CartRepository',
        ],
    ]
]);

$di->setShared('CartItemService', [
    'className' => \App\Models\Services\CartItemService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'CartItemRepository',
        ],
    ]
]);