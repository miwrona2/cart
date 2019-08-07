<?php
namespace App\Controllers;

use App\System\Commands\DeleteProduct;
use App\System\Commands\EditProduct;
use Phalcon\Mvc\Controller;
use App\Forms\ProductForm;
use App\Models\Product;
use App\System\CommandBus;
use App\System\Commands\AddNewProduct;
use App\Models\Services\ProductService;

class ProductController extends Controller
{
    /** @var CommandBus */
    private $commandBus;

    public function initialize()
    {
        $this->commandBus = new CommandBus();
    }

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
            $requestData = $this->request->getPost();
            if (!$form->isValid($requestData)) {
                $messages = $form->getMessages();
                $this->flashSession->error($messages[0]);
            } else {
                    $command = new AddNewProduct($requestData['title'], $requestData['price']);
                try {
                    $this->commandBus->handle($command);
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
            $command = new DeleteProduct($id);
            try {
                $this->commandBus->handle($command);
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
        $form = new ProductForm($product, ["edit" => true,]);

        if ($this->request->isPost()) {
            $requestData = $this->request->getPost();
            if(!$form->isValid($requestData)) {
                $messages = $form->getMessages();
                $this->flashSession->error($messages[0]);
            } else {
                $command = new EditProduct($requestData['title'], $requestData['price'], $product);
                try {
                    $this->commandBus->handle($command);
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