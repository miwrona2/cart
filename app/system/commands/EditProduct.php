<?php

namespace App\System\Commands;

use App\Models\Product;

class EditProduct implements Command
{
    private $title;
    private $price;
    private $product;

    public function __construct(string $title, float $price, Product $product)
    {
        $this->title = $title;
        $this->price = $price;
        $this->product = $product;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
}