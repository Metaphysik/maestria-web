<?php

namespace Application\Entities;

/**
 * @Entity @Table(name="domain")
 **/
class Domain
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
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
}
