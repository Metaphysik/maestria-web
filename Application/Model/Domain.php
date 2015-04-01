<?php


namespace Application\Model;


class Domain extends Generic
{

    public function labelExists($label) {

        $e = $this->_repository->findBy(['label' => $label], null, 1);

        return (count($e) >= 1);
    }

    public function getRecursiveInformation()
    {

        // TODO : Make it 

        return [];
    }

    public function insert($label)
    {

        if($this->labelExists($label) === false)
            return $this->_insert($label);

        return false;
    }


    protected function _insert($label)
    {
        $domain = new \Application\Entities\Domain();
        $domain->setLabel($label);


        $this->_em->persist($domain);
        $this->_em->flush();

        $this->id = $domain->getId();

        return true;
    }
}
