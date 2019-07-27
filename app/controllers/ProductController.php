<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Query;

class ProductController extends Controller
{
    public function listAction()
    {
        /** @var ProductService $productService */
        $productService = $this->getDI()->get('ProductService');
        $products = $productService->getList();

        $this->view->products = $products;
        $url = $this->getDI()->get('url');
        $this->view->addUrl = $url->get('product/add');
    }

    public function addAction()
    {
        $form = new ProductForm();
        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                $messages = $form->getMessages();
                $this->flashSession->error($messages[0]);
            } else {
                $product = new Product();
                $form->bind($this->request->getPost(), $product);
                /** @var ProductRepository $pr */
                $pr = $this->getDI()->get('ProductRepository');
                try {
                    $pr->create($product);
                    $this->flashSession->success('Product has been added successfully!');
                    $this->response->redirect('product/list');
                } catch (\Exception $e) {
                    $this->flashSession->error($e->getMessage());

                }
            }

        }
        $url = $this->getDI()->get('url');
        $this->view->listUrl = $url->get('product/list');
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('id', 'int');
            /** @var ProductService $productService */
            $productService = $this->getDI()->get('ProductService');
            try {
                $productService->delete($id);
                $this->flashSession->success('Product has been deleted successfully!');
            } catch (\Exception $e) {
                $this->flashSession->error($e->getMessage());
            }
        }
        $this->response->redirect('product/list');
    }

}