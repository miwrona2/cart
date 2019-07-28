<?php

class Cart extends ModelBase
{
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


}