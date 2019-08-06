<?php
namespace App\System\Handlers;

use App\Models\Product;
use App\System\Commands\AddNewProduct;

final class AddNewProductHandler
{
    private $productRepository;

    public function __construct(\ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(AddNewProduct $command) : void
    {
        $product = new Product();
        $product->setTitle($command->getTitle());
        $product->setPrice($command->getPrice());

        $this->productRepository->create($product);
    }
}