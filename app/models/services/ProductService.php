<?php
namespace App\Models\Services;

use Phalcon\DI\Injectable;
use App\Forms\DeleteForm;
use App\Models\Product;
use App\Models\Repositories\ProductRepository;

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
            throw new \Exception('An internal error occured!');
        }
        $this->productRepository->delete($product);
    }

    public function edit(Product $product): void
    {
        $this->productRepository->update($product);
    }
}