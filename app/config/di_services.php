<?php

$di->setShared('ProductRepository', [
    'className' => ProductRepository::class
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