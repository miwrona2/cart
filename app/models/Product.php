<?php

use Phalcon\Mvc\Model\Relation;

class Product extends ModelBase
{
    private const TABLE = 'product';
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $cart_id;


    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Product
    {
        $this->title = $title;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getCartId(): ?int
    {
        return $this->cart_id ?: null;
    }

    public function setCartId(?int $cart_id): ?Product
    {
        $this->cart_id = $cart_id;
        return $this;
    }

    public function initialize()
    {
        $this->setSource(self::TABLE);
        $this->hasMany(
            "id",
            CartItem::class,
            "product_id",
            [
                "alias" => 'cartItems',
                "foreignKey" => [
                    "action" => Relation::ACTION_CASCADE,
                ]
            ]
        );
    }
}