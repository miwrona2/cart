<?php
namespace App\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;

class ProductForm extends Form
{
    public function initialize(Product $entity = null, $options = [])
    {

        if (isset($options["edit"])) {
            $this->add(new Hidden('id'));
//            $this->add(new Hidden('cart_id'));
        }

        $title = new Text('title');
        $title->setLabel('Title');
        $title->setFilters(['string']);
        $title->addValidators([
            new PresenceOf(['message' => 'Title is required']),
        ]);
        $this->add($title);

        $price = new Text('price');
        $price->setLabel('price');
        $price->setFilters('float!');
        $price->addValidators([
            new PresenceOf(['message' => 'Price is required']),
            new Numericality(['message' => 'Price should be numeric']),
        ]);
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