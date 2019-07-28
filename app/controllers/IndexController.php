<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $url = $this->getDI()->get('url');

        $this->view->productListUrl = $url->get('product/list');
        $this->view->cartUrl = $url->get('cart/list');
    }

}