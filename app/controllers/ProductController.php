<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Query;

class ProductController extends Controller
{
    public function listAction()
    {
        $products = Product::find();

        $this->view->products = $products;
    }

}