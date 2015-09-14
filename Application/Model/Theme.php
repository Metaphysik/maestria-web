<?php

namespace Application\Model;

class Theme extends Generic
{
    public function getByRef($domainId)
    {
        return $this->_repository->findBy(['refDomain' => $domainId]);
    }

    public function insert($label, $refDomain)
    {
        if ($this->labelExists($label, $refDomain) === false) {
            return $this->_insert($label, $refDomain);
        }

        return false;
    }

    public function labelExists($label, $ref)
    {
        $e = $this->_repository->findBy(['label' => $label, 'refDomain' => $ref], null, 1);

        return (count($e) >= 1);
    }

    protected function _insert($label, $ref)
    {
        $theme = new \Application\Entities\Theme();
        $theme->setLabel($label);
        $theme->setRefDomain($ref);

        $this->_em->persist($theme);
        $this->_em->flush();

        $this->id = $theme->getId();

        return true;
    }
}
