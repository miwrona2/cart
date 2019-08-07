<?php
namespace App\System\Commands;

use App\Models\Cart;

class AddItem implements Command
{
    /** @var Cart $cart*/
    private $cart;
    private $productId;

    public function __construct(Cart $cart, int $productId)
    {
        $this->cart = $cart;
        $this->productId = $productId;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}