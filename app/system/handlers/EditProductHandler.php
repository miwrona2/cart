<?php
namespace App\System\Handlers;

use App\Models\Repositories\ProductRepository;
use App\System\Commands\Command;
use App\System\Commands\EditProduct;

final class EditProductHandler implements Handler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(Command $command) : void
    {
        /** @var EditProduct $command */
        $product = $command->getProduct();
        $product->setTitle($command->getTitle());
        $product->setPrice($command->getPrice());

        $this->productRepository->update($product);
    }
}