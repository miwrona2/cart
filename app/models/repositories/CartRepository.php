<?php
namespace App\Models\Repositories;

use App\Models\CartItem;
use App\Models\Product;
use Phalcon\Mvc\Model\Row;

class CartRepository extends BaseRepository
{
    public function getSaldo(int $cartId): Row
    {
        return $this->modelsManager->createBuilder()
            ->addFrom(CartItem::class, 'ci')
            ->join(Product::class, 'p.id = ci.product_id', 'p')
            ->where('ci.cart_id = :cartId:', ['cartId' => $cartId])
            ->columns('sum(price)')
            ->getQuery()
            ->getSingleResult();
    }
}