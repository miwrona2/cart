<?php
namespace App\Models\Repositories;

use App\Models\CartItem;
use Phalcon\Mvc\Model\Resultset;

class CartItemRepository extends BaseRepository
{
    public function findByCartIdAndProductId(int $cartId, int $productId): Resultset
    {
        return $this->modelsManager->createBuilder()
            ->addFrom(CartItem::class, 'ci')
            ->where('ci.cart_id = :cartId:', ['cartId' => $cartId])
            ->andWhere('ci.product_id = :productId:', ['productId' => $productId])
            ->getQuery()
            ->execute();
    }
}