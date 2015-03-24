<?php


namespace Application\Model;


class Classroom extends Generic
{

    public function classExist($label, $uia = null)
    {
        if ($uia === null) {
            $uia = UIA;
        }
        $e = $this->_repository->findBy(['refUia' => $uia, 'label' => $label], null, 1);

        return (count($e) >= 1);
    }
    public function insert($uia, $label)
    {
        $slug = new Uia();
        $slug = $slug->getBySlug($uia);
        $uia  = $slug->getId();

        if($this->classExist($label, $uia) === false)
            return $this->_insert($uia, $label);

        return false;

    }
    protected function _insert($slug, $label)
    {
        $class = new \Application\Entities\Classroom();
        $class->setRefUia($slug);
        $class->setLabel($label);

        $this->_em->persist($class);
        $this->_em->flush();

        return true;
    }

    public function getBySlug($uia) {
        $slug = new Uia();
        $slug = $slug->getBySlug($uia);
        $uia  = $slug->getId();

        return $this->_repository->findBy(['refUia' => $uia], null, 1);
    }
}