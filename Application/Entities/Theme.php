<?php

namespace Application\Entities;

/**
 * @Entity @Table(name="theme")
 **/
class Theme
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="integer") * */
    protected $refDomain;

    /** @Column(type="string") * */
    protected $label;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getRefDomain()
    {
        return $this->refDomain;
    }

    /**
     * @param mixed $refDomain
     */
    public function setRefDomain($refDomain)
    {
        $this->refDomain = $refDomain;
    }
}
