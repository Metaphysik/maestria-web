<?php
namespace Application\Model;

use Application\Maestria\Container;

class Generic
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_em = null;
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $_repository = null;

    public function __construct()
    {
        $this->_em         = Container::getContainer('em');
        $class             = get_class($this);
        $entity            = substr($class, strrpos($class, '\\') + 1);
        $this->_repository = $this->_em->getRepository('Application\Entities\\' . ucfirst($entity));
    }

    public function get($id)
    {
        $class  = get_class($this);
        $entity = substr($class, strrpos($class, '\\') + 1);

        return $this->_em->find('Application\Entities\\' . ucfirst($entity), $id);
    }
}