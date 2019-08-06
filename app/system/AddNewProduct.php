<?php


class AddNewProduct
{
    private $title;
    private $price;

    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}