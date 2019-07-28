<?php

use Phalcon\Mvc\Controller;

class CartController extends Controller
{
    public function listAction()
    {
        /** @var CartService $cartService */
        $cartService = $this->getDI()->get('CartService');
        $firstCart = $cartService->getFirstCart();
        $url = $this->getDI()->get('url');

        $this->view->cartItems = $firstCart->getCartItems();
        $this->view->productListUrl = $url->get('product/list');
    }

}