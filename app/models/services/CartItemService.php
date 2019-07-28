<?php

use Phalcon\DI\Injectable;

class CartItemService extends Injectable
{
    const MAIN_CART_NAME = 'main_cart';

    private $cartItemRepository;

    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function addItem(Cart $cart, int $productId): void
    {
        $cartItem = new CartItem();
        $cartItem->setProductId($productId);
        $cartItem->setCartId($cart->getId());
        $this->cartItemRepository->create($cartItem);
    }

}