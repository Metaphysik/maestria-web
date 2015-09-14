<?php

namespace Application\Entities;

/**
 * @Entity @Table(name="evaluation")
 **/
class Evaluation
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
    /** @Column(type="integer") * */
    protected $uia;
    /** @Column(type="integer") * */
    protected $refuser;
    /** @Column(type="string") * */
    protected $title;
    /** @Column(type="string") * */
    protected $createdate;
    /** @Column(type="string") * */
    protected $updatedate;

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
    public function getUia()
    {
        return $this->uia;
    }

    /**
     * @param mixed $uia
     */
    public function setUia($uia)
    {
        $this->uia = $uia;
    }

    /**
     * @return mixed
     */
    public function getRefuser()
    {
        return $this->refuser;
    }

    /**
     * @param mixed $refuser
     */
    public function setRefuser($refuser)
    {
        $this->refuser = $refuser;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * @param mixed $createdate
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
    }

    /**
     * @return mixed
     */
    public function getUpdatedate()
    {
        return $this->updatedate;
    }

    /**
     * @param mixed $updatedate
     */
    public function setUpdatedate($updatedate)
    {
        $this->updatedate = $updatedate;
    }
}
