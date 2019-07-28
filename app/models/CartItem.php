<?php

class CartItem extends ModelBase
{
    private const TABLE = 'cart_item';
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $cart_id;
    /**
     * @var int
     */
    private $product_id;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CartItem
    {
        $this->id = $id;
        return $this;
    }

    public function getCartId(): int
    {
        return $this->cart_id;
    }

    public function setCartId(int $cart_id): CartItem
    {
        $this->cart_id = $cart_id;
        return $this;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): CartItem
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function initialize()
    {
        $this->setSource(self::TABLE);

        $this->belongsTo('product_id', Product::class, 'id', [
            'alias' => 'product',
            'foreignKey' => [
                'allowNulls' => false,
                'message' => 'The company doest not exist'
            ]
        ]);
    }
}