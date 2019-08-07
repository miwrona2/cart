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

$di->setShared('AddNewProductHandler', [
    'className' => \App\System\Handlers\AddNewProductHandler::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'ProductRepository',
        ],
    ]
]);

$di->setShared('DeleteProductHandler', [
    'className' => \App\System\Handlers\DeleteProductHandler::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'ProductRepository',
        ],
    ]
]);

$di->setShared('EditProductHandler', [
    'className' => \App\System\Handlers\EditProductHandler::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'ProductRepository',
        ],
    ]
]);

$di->setShared('ProductQuery', [
    'className' => \App\System\Queries\ProductQuery::class,
]);

