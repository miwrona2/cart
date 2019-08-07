<?php
namespace App\System\Handlers;


use App\Models\CartItem;
use App\Models\Repositories\CartItemRepository;
use App\System\Commands\Command;
use App\System\Commands\DeleteItem;

final class DeleteItemHandler implements Handler
{
    private $cartItemRepository;

    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function handle(Command $command): void
    {
        /** @var DeleteItem $command */
        $cartItem = CartItem::findFirstById($command->getId());
            if (!$cartItem instanceof CartItem) {
            throw new \Exception('An internal error occured!');
        }
        $this->cartItemRepository->delete($cartItem);
    }
}