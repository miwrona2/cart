<?php
namespace App\System\Handlers;


use App\Models\Product;
use App\Models\Repositories\ProductRepository;
use App\System\Commands\DeleteProduct;

class DeleteProductHandler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(DeleteProduct $command): void
    {
        $product = Product::findFirstById($command->getId());
        if (!$product instanceof Product) {
            throw new \Exception('An internal error occured!');
        }
        $this->productRepository->delete($product);
    }
}