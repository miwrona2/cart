<?php
namespace App\Models\Repositories;

use Phalcon\Mvc\Model\Resultset;
use App\Models\CartItem;

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