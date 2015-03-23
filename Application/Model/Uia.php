<?php


namespace Application\Model;


use Hoa\Core\Exception\Exception;

class Uia extends Generic
{

    public function getBySlug($slug)
    {
        return $this->getBy('slug', $slug);
    }

    public function getBy($column, $value)
    {
        /**
         * @var $entity \Application\Entities\Uia
         */
        $entity = $this->_repository->findBy([$column => $value]);

        if (count($entity) === 1) {
            return $entity[0];
        } else {
            throw new Exception('Item %s with value %s are not in database', 0, [$column, $value]);
        }
    }
}
