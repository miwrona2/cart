<?php
namespace App\Controllers;

use App\Models\Services\CartService;
use Phalcon\Mvc\Controller;

class CartController extends Controller
{
    public function listAction()
    {
        /** @var CartService $cartService */
        $cartService = $this->getDI()->get('CartService');
        $url = $this->getDI()->get('url');
        $firstCart = $cartService->getFirstCart();

        $this->view->cartItems = $cartService->getItems($firstCart);
        $this->view->productListUrl = $url->get('product/list');
        $this->view->cartsSaldo = $cartService->getSaldo($cartService->getFirstCart());
    }

}