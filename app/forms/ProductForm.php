<?php

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Form;

class ProductForm extends Form
{
    public function initialize(Product $entity = null, $options = [])
    {
        $title = new Text('title');
        $title->setLabel('Title');
        $title->setFilters(['xss', 'string']);
        $this->add($title);

        $price = new Numeric('price');
        $price->setLabel('price');
        $price->setFilters('float');
        $this->add($price);

        $submit = new Submit('submit');
        $submit->setDefault('Submit');
        $this->add($submit);
    }

    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}