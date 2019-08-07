<?php
namespace App\Controllers;

use App\System\Queries\CartQuery;
use Phalcon\Mvc\Controller;

class CartController extends Controller
{
    public function listAction()
    {
        /** @var CartQuery $cartQuery */
        $cartQuery = $this->getDI()->get('CartQuery');
        $url = $this->getDI()->get('url');

        $this->view->cartItems = $cartQuery->getAllItems();
        $this->view->productListUrl = $url->get('product/list');
    }

}