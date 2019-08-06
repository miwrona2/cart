<?php
namespace App\Controllers;

use Phalcon\Mvc\Controller;

class CartController extends Controller
{
    public function listAction()
    {
        /** @var \CartService $cartService */
        $cartService = $this->getDI()->get('CartService');
        $url = $this->getDI()->get('url');

        $this->view->cartItems = $cartService->getItems();
        $this->view->productListUrl = $url->get('product/list');
    }

}