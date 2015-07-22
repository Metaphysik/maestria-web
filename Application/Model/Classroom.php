<?php


namespace Application\Model;


class Classroom extends Generic
{

    public function insert($uia, $label)
    {
        $slug = new Uia();
        $slug = $slug->getBySlug($uia);
        $uia  = $slug->getId();

        if ($this->classExist($label, $uia) === false) {
            return $this->_insert($uia, $label);
        }

        return false;

    }

    public function classExist($label, $uia = null)
    {
        if ($uia === null) {
            $uia = UIA;
        }
        if (is_string($uia) === true) {
            $slug = new Uia();
            $uia  = $slug->getBySludId(UIA);
        }
        $e = $this->_repository->findBy(['refUia' => $uia, 'label' => $label], null, 1);

        return (count($e) >= 1);
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

    public function getBySlug($uia)
    {
        $slug = new Uia();
        $slug = $slug->getBySlug($uia);
        $uia  = $slug->getId();

        return $this->_repository->findBy(['refUia' => $uia]);
    }

    public function getStudentOrderByClasses($uia)
    {
        if ($uia === null) {
            $uia = UIA;
        }
        if (is_string($uia) === true) {
            $slug = new Uia();
            $uia  = $slug->getBySludId(UIA);
        }

        $element  = [];
        $user     = new User();
        $entities = $this->getRepository('UserClass')->findBy(['refUia' => $uia]);

        foreach ($entities as $entity) {
            /**
             * @var $entity \Application\Entities\UserClass
             * @var $e \Application\Entities\User
             */
            $e = $user->get($entity->getRefUser());
            if ($e->getStatus() >= 0) {
                $element[$entity->getRefClassroom()][] = $e;
            }
        }

        return $element;
    }
}