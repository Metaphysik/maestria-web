<?php
namespace Application\Model;

use Application\Maestria\Container;

class Generic
{
    protected $_em     = null;
    protected $_entity = null;

    public function __construct()
    {
        $this->_em     = Container::getContainer('em');
        $class         = get_class($this);
        $entity        = substr($class, strrpos($class, '\\') + 1);
        $this->_entity = dnew('\\Application\\Entities\\' . $entity);
    }

    public function get($id)
    {

    }

    public function all()
    {

    }

    public function getBy($column, $value)
    {

    }


}