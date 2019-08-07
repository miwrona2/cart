<?php
namespace App\System\Handlers;

use App\Models\Product;
use App\System\Commands\AddNewProduct;
use App\Models\Repositories\ProductRepository;
use App\System\Commands\Command;

final class AddNewProductHandler implements Handler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(Command $command) : void
    {
        /** @var AddNewProduct $command */
        $product = new Product();
        $product->setTitle($command->getTitle());
        $product->setPrice($command->getPrice());

        $this->productRepository->create($product);
    }
}