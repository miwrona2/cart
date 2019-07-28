<?php

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

    public function getItems(): array
    {
        $items = $this->getFirstCart()->getCartItems();
        $results = [];
        foreach ($items as $key => $item) {
            $results[$key]['entity'] = $item;
            $results[$key]['deleteForm'] = new DeleteForm($item);
        }
        return $results;
    }
}