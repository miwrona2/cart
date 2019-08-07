<?php

namespace App\System\Handlers;

use App\Models\CartItem;
use App\Models\Repositories\CartItemRepository;
use App\Models\Services\CartItemService;
use App\System\Commands\AddItem;
use App\System\Commands\Command;

class AddItemHandler implements Handler
{
    private $cartItemService;
    private $cartItemRepository;

    public function __construct(CartItemService $cartItemService, CartItemRepository $cartItemRepository)
    {
        $this->cartItemService = $cartItemService;
        $this->cartItemRepository = $cartItemRepository;
    }

    public function handle(Command $command): void
    {
        /** @var AddItem $command */
        $cartId = $command->getCart()->getId();
        $productId = $command->getProductId();

        $this->cartItemService->preventDuplicate($cartId, $productId);

        $cartItem = new CartItem();
        $cartItem->setProductId($productId);
        $cartItem->setCartId($cartId);

        $this->cartItemRepository->create($cartItem);
    }
}