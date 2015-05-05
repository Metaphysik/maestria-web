<?php


namespace Application\Entities;


/**
 * @Entity @Table(name="question")
 **/
class Question
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
    /** @Column(type="integer") * */
    protected $refEvaluation;
    /** @Column(type="string") * */
    protected $title;
    /** @Column(type="integer") * */
    protected $taxo;
    /** @Column(type="integer") * */
    protected $point;
    /** @Column(type="integer") * */
    protected $item1;
    /** @Column(type="integer") * */
    protected $item2;

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
    public function getRefEvaluation()
    {
        return $this->refEvaluation;
    }

    /**
     * @param mixed $refEvaluation
     */
    public function setRefEvaluation($refEvaluation)
    {
        $this->refEvaluation = $refEvaluation;
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
    public function getTaxo()
    {
        return $this->taxo;
    }

    /**
     * @param mixed $taxo
     */
    public function setTaxo($taxo)
    {
        $this->taxo = $taxo;
    }

    /**
     * @return mixed
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param mixed $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }

    /**
     * @return mixed
     */
    public function getItem1()
    {
        return $this->item1;
    }

    /**
     * @param mixed $item1
     */
    public function setItem1($item1)
    {
        $this->item1 = $item1;
    }

    /**
     * @return mixed
     */
    public function getItem2()
    {
        return $this->item2;
    }

    /**
     * @param mixed $item2
     */
    public function setItem2($item2)
    {
        $this->item2 = $item2;
    }


}