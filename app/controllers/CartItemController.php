<?php
namespace App\Controllers;

use App\Models\Services\CartService;
use App\System\CommandBus;
use App\System\Commands\AddItem;
use App\System\Commands\DeleteItem;
use Phalcon\Mvc\Controller;

class CartItemController extends Controller
{
    /** @var CommandBus */
    private $commandBus;

    /** @var CartService */
    private $cartService;
    
    public function initialize()
    {
        $this->commandBus = new CommandBus();
        $this->cartService = $this->getDI()->get('CartService');
    }
    public function addItemAction($product_id)
    {
        try {
            $cart = $this->cartService->getFirstCart();
            $command = new AddItem($cart, $product_id);
            $this->commandBus->handle($command);
            $this->flashSession->success('Product has been added successfully to a cart!');
        } catch (\RuntimeException $e) {
            $this->flashSession->error($e->getMessage());
        } catch (\Exception $e) {
            // log error
            $this->flashSession->error('An internal error occured!');
        }
        $this->response->redirect('product/list');
    }

    public function deleteItemAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('id', 'int');
            $command = new DeleteItem($id);
            try {
                $this->commandBus->handle($command);
                $this->flashSession->success('Product has been deleted from a cart successfully!');
            } catch (\Exception $e) {
                $this->flashSession->error($e->getMessage());
            }
        }
        $this->response->redirect('cart/list');
    }

}