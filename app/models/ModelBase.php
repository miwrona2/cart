<?php

use Phalcon\MVC\Model;

/**
 * Class ModelBase
 *  * @method static findFirstById(int $id)
 */
class ModelBase extends Model
{
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}