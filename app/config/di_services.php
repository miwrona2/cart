<?php

$di->setShared('ProductRepository', [
    'className' => ProductRepository::class
]);

$di->setShared('CartRepository', [
    'className' => CartRepository::class
]);

$di->setShared('CartItemRepository', [
    'className' => CartItemRepository::class
]);

$di->setShared('ProductService', [
    'className' => ProductService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'ProductRepository',
        ],
    ]
]);

$di->setShared('CartService', [
    'className' => CartService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'CartRepository',
        ],
    ]
]);

$di->setShared('CartService', [
    'className' => CartService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'CartRepository',
        ],
    ]
]);

$di->setShared('CartItemService', [
    'className' => CartItemService::class,
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