<?php
namespace App\Models\Services;

use App\Forms\DeleteForm;
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

    public function getItems(Cart $cart): array
    {
        $items = $cart->getCartItems();
        $results = [];
        foreach ($items as $key => $item) {
            $results[$key]['entity'] = $item;
            $results[$key]['deleteForm'] = new DeleteForm($item);
        }
        return $results;
    }

    public function getSaldo(Cart $cart): ?float
    {
        $queryResult =  $this->cartRepository->getSaldo($cart->getId());
        return (float)$queryResult->toArray()[0];
    }
}