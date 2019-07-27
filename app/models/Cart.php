<?php

class Cart
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $product_id;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Cart
    {
        $this->id = $id;
        return $this;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): Cart
    {
        $this->product_id = $product_id;
        return $this;
    }


}