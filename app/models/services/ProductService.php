<?php

use Phalcon\DI\Injectable;

class ProductService extends Injectable
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getList(): array
    {
        $products = Product::find();
        $results = [];
        foreach ($products as $key => $product) {
            $results[$key]['entity'] = $product;
            $results[$key]['deleteForm'] = new DeleteForm($product);
        }
        return $results;
    }

    public function delete(?int $id): void
    {
        $product = Product::findFirstById($id);
        if (!$product instanceof Product) {
            throw new \Exception('Internal error occured');
        }
        $this->productRepository->delete($product);
    }
}