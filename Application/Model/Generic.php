<?php
namespace Application\Model;

use Application\Maestria\Container;
use Hoa\Core\Exception\Exception;

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
        $this->_repository = $this->getRepository($entity);
    }

    public function getRepository($entity)
    {
        return $this->_em->getRepository('Application\Entities\\' . ucfirst($entity));
    }

    public function get($id)
    {
        $class  = get_class($this);
        $entity = substr($class, strrpos($class, '\\') + 1);

        return $this->_em->find('Application\Entities\\' . ucfirst($entity), $id);
    }

    public function getBy($column, $value)
    {
        $entity = $this->_repository->findBy([$column => $value]);

        if (count($entity) === 1) {
            return $entity[0];
        } else {
            throw new Exception('Item %s with value %s are not in database', 0, [$column, $value]);
        }
    }

    protected function _exists($column, $value)
    {
        $e = $this->_repository->findBy([$column => $value], null, 1);

        return (count($e) >= 1);
    }
}