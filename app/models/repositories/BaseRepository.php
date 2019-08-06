<?php
namespace App\Models\Repositories;

use Phalcon\DI\Injectable;
use Phalcon\MVC\Model;

abstract class BaseRepository extends Injectable
{
    public function delete(Model $entity): void
    {
        if (!$entity->delete()) {
            $messages = $entity->getMessages();
            throw new \Exception($messages[0]);
        }
    }

    public function save(Model $entity): void
    {
        if (!$entity->save()) {
            $messages = $entity->getMessages();
            throw new \Exception($messages[0]);
        }
    }

    public function create(Model $entity): void
    {
        if (!$entity->create()) {
            $messages = $entity->getMessages();
            throw new \Exception($messages[0]);
        }
    }

    public function update(Model $entity): void
    {
        if (!$entity->update()) {
            $messages = $entity->getMessages();
            throw new \Exception($messages[0]);
        }
    }
}