<?php
namespace App\Models\Services;

use App\Models\Repositories\CartItemRepository;
use Phalcon\DI\Injectable;

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
}