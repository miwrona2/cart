<?php

use Phalcon\Forms\Form;
use Phalcon\Mvc\Model;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Submit;

class DeleteForm extends Form
{
    public function initialize(Model $entity = null, $options = [])
    {
        if ($entity) {
            $this->setEntity($entity);
        }

        $id = new Hidden('id');
        $id->addValidators([
            new PresenceOf(['message' => 'An internal error occured']),
        ]);
        $this->add($id);

        $submit = new Submit('deleteSubmit');
        $submit->setDefault('Delete');
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