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
        $this->preventDuplicate($cart->getId(), $productId);
        $cartItem = new CartItem();
        $cartItem->setProductId($productId);
        $cartItem->setCartId($cart->getId());
        $this->cartItemRepository->create($cartItem);
    }

    public function preventDuplicate(int $cartId, int $productId): void
    {
        $results = $this->cartItemRepository->findByCartIdAndProductId($cartId, $productId);
        if ($results->count() > 0) {
            throw new \RuntimeException('Product can be added to cart only once!');
        }
    }
}