<?php

use Phalcon\Mvc\Model\Relation;

class Cart extends ModelBase
{
    private const TABLE = 'cart';
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Cart
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Cart
    {
        $this->name = $name;
        return $this;
    }

    public function initialize()
    {
        $this->setSource(self::TABLE);
        $this->hasMany(
            "id",
            CartItem::class,
            "cart_id",
            [
                "alias" => 'cartItems',
                "foreignKey" => [
                    "action" => Relation::ACTION_CASCADE,
                ]
            ]
        );
    }
}