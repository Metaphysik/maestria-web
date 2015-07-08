<?php


namespace Application\Entities;


/**
 * @Entity @Table(name="answer")
 **/
class Answer
{
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
    /** @Column(type="integer") * */
    protected $refUia;
    /** @Column(type="integer") * */
    protected $refEval;
    /** @Column(type="integer") * */
    protected $refUser;
    /** @Column(type="string") * */
    protected $answer;

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
    public function getRefEval()
    {
        return $this->refEval;
    }

    /**
     * @param mixed $refEval
     */
    public function setRefEval($refEval)
    {
        $this->refEval = $refEval;
    }

    /**
     * @return mixed
     */
    public function getRefUser()
    {
        return $this->refUser;
    }

    /**
     * @param mixed $refUser
     */
    public function setRefUser($refUser)
    {
        $this->refUser = $refUser;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }


}