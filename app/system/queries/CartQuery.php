<?php
namespace App\System\Queries;

use App\Forms\DeleteForm;
use App\Models\Services\CartService;
use Phalcon\Di\Injectable;

class CartQuery extends Injectable
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function getAllItems(): array
    {
        $items = $this->cartService->getFirstCart()->getCartItems();
        $results = [];
        foreach ($items as $key => $item) {
            $results[$key]['entity'] = $item;
            $results[$key]['deleteForm'] = new DeleteForm($item);
        }
        return $results;
    }
}