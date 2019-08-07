<?php
namespace App\Models\Services;

use Phalcon\DI\Injectable;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Repositories\CartItemRepository;

class CartItemService extends Injectable
{
    private $cartItemRepository;

    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function preventDuplicate(int $cartId, int $productId): void
    {
        $results = $this->cartItemRepository->findByCartIdAndProductId($cartId, $productId);
        if ($results->count() > 0) {
            throw new \RuntimeException('Product can be added to cart only once!');
        }
    }

    public function delete(?int $id): void
    {
        $cartItem = CartItem::findFirstById($id);
        if (!$cartItem instanceof CartItem) {
            throw new \Exception('An internal error occured!');
        }
        $this->cartItemRepository->delete($cartItem);
    }
}