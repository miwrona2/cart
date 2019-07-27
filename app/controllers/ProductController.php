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

    public function addAction()
    {
        if ($this->request->isPost()) {
            try {
                /** @var ProductRepository $pr */
                $pr = $this->getDI()->get('ProductRepository');
                $product = new Product();
                $product->setTitle($this->request->getPost('title'));
                $product->setPrice($this->request->getPost('price'));
                $pr->create($product);
                $this->response->redirect('product/list');
            } catch (\Exception $e) {
                $e->getMessage();
            }
        }
        $this->view->form = new ProductForm();
    }

}