<?php

use Phalcon\Mvc\Controller;

class CartItemController extends Controller
{
    public function addItemAction($product_id)
    {
        /** @var CartService $cartService */
        $cartService = $this->getDI()->get('CartService');

        /** @var CartItemService $cartItemService */
        $cartItemService = $this->getDI()->get('CartItemService');

        try {
            $cart = $cartService->getFirstCart();
            $cartItemService->addItem($cart, $product_id);
            $this->flashSession->success('Product has been added successfully to a cart!');
        } catch (\RuntimeException $e) {
            $this->flashSession->error($e->getMessage());
        } catch (\Exception $e) {
            // log error
            $this->flashSession->error('An internal error occured!');
        }
        $this->response->redirect('product/list');
    }

    public function removeItemAction()
    {

    }

}