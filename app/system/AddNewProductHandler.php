<?php


final class AddNewProductHandler
{

    public function __construct()
    {
    }

    public function handle(AddNewProduct $command) : void
    {
        $product = new \Product();
        $product->setTitle($command->getTitle());
        $product->setPrice($command->getPrice());

        $productRepository = new ProductRepository();
        $productRepository->create($product);
    }
}