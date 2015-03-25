<?php
/**
 * Created by PhpStorm.
 * User: camael
 * Date: 25/03/15
 * Time: 20:29
 */

namespace Application\Entities;

/**
 * @Entity @Table(name="userclass")
 **/
class UserClass {
    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
    /** @Column(type="integer") * */
    protected $refUia;
    /** @Column(type="integer") * */
    protected $refUser;
    /** @Column(type="integer") * */
    protected $refClassroom;

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
    public function getRefClassroom()
    {
        return $this->refClassroom;
    }

    /**
     * @param mixed $refClassroom
     */
    public function setRefClassroom($refClassroom)
    {
        $this->refClassroom = $refClassroom;
    }


}