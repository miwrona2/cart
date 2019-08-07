<?php
namespace App\Models\Services;

use App\Models\Cart;
use App\Models\Repositories\CartRepository;
use Phalcon\DI\Injectable;

class CartService extends Injectable
{
    const MAIN_CART_NAME = 'main_cart';

    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getFirstCart(): Cart
    {
        $cart = Cart::findFirst(['name' => self::MAIN_CART_NAME]);
        if (!$cart instanceof Cart){
            $cart = new Cart();
            $cart->setName(self::MAIN_CART_NAME);
            $this->cartRepository->create($cart);
        }
        return $cart;
    }
}