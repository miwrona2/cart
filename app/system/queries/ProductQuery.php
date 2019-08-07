<?php
namespace App\System\Queries;

use App\Forms\DeleteForm;
use App\Models\Product;
use Phalcon\Di\Injectable;

class ProductQuery extends Injectable
{
    public function getAll(): array
    {
        $products = Product::find();
        $results = [];
        foreach ($products as $key => $product) {
            $results[$key]['entity'] = $product;
            $results[$key]['deleteForm'] = new DeleteForm($product);
        }
        return $results;
    }
}