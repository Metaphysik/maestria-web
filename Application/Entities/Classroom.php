<?php


namespace Application\Entities;


/**
 * @Entity @Table(name="classroom")
 **/
class Classroom
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
    /** @Column(type="integer") * */
    protected $refUia;
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
    public function getRefUia()
    {
        return $this->refUia;
    }

    /**
     * @param mixed $refUia
     */
    public function setRefUia($refUia)
    {
        $this->refUia = $refUia;
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