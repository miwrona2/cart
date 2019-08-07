<?php
namespace App\System\Handlers;


use App\Models\Product;
use App\Models\Repositories\ProductRepository;
use App\System\Commands\Command;
use App\System\Commands\DeleteProduct;

final class DeleteProductHandler implements Handler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(Command $command): void
    {
        /** @var DeleteProduct $command */
        $product = Product::findFirstById($command->getId());
        if (!$product instanceof Product) {
            throw new \Exception('An internal error occured!');
        }
        $this->productRepository->delete($product);
    }
}