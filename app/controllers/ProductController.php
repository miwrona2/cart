<?php

use Phalcon\Mvc\Controller;

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
        $this->view->editUrl = $url->get('product/edit');
        $this->view->addToCartUrl = $url->get('cartitem/additem');
        $this->view->cartUrl = $url->get('cart/list');
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
                /** @var ProductRepository $productRepository */
                $productRepository = $this->getDI()->get('ProductRepository');
                try {
                    $productRepository->create($product);
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

    public function editAction($id)
    {
        $id = $this->filter->sanitize($id, 'int');
        $product = Product::findFirstById($id);
        $form = new ProductForm($product,["edit" => true,]);

        if ($this->request->isPost()) {
            if(!$form->isValid($this->request->getPost())) {
                $messages = $form->getMessages();
                $this->flashSession->error($messages[0]);
            } else {
                /** @var ProductService $productService */
                $productService = $this->getDI()->get('ProductService');
                try {
                    $productService->edit($product);
                    $this->flashSession->success('Product has been edited successfully!');
                    $this->response->redirect('product/list');
                } catch (\Exception $e) {
                    $this->flashSession->error($e->getMessage());
                }
            }
        }

        $this->view->product = $product;
        $this->view->form = $form;
        $url = $this->getDI()->get('url');
        $this->view->listUrl = $url->get('product/list');
    }

}