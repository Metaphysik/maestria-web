<?php


namespace Application\Entities;


/**
 * @Entity @Table(name="item")
 **/
class Item
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;

    /** @Column(type="integer") * */
    protected $refTheme;

    /** @Column(type="string") * */
    protected $label;

    /** @Column(type="integer") * */
    protected $type; // 0 = Base, 1 = User Submition

    /** @Column(type="integer") * */
    protected $lvl;

    /** @Column(type="integer") * */
    protected $status; // -1 = Trashed/Ban , 0 = unvalidate, 1 = validation progress, 2 = validate

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
    public function getRefTheme()
    {
        return $this->refTheme;
    }

    /**
     * @param mixed $refTheme
     */
    public function setRefTheme($refTheme)
    {
        $this->refTheme = $refTheme;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * @param mixed $lvl
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
    }


}