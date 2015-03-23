<?php
namespace Application\Entities;

/**
 * @Entity @Table(name="user")
 **/
class User
{
    protected $id;
    protected $login;
    protected $email;
    protected $password;
    protected $isAdmin;
    protected $isModerator;
    protected $isProfessor;
    protected $realName;
    protected $connectTime;
    protected $registerTime;
    protected $token;
    protected $status;

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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getIsModerator()
    {
        return $this->isModerator;
    }

    /**
     * @param mixed $isModerator
     */
    public function setIsModerator($isModerator)
    {
        $this->isModerator = $isModerator;
    }

    /**
     * @return mixed
     */
    public function getIsProfessor()
    {
        return $this->isProfessor;
    }

    /**
     * @param mixed $isProfessor
     */
    public function setIsProfessor($isProfessor)
    {
        $this->isProfessor = $isProfessor;
    }

    /**
     * @return mixed
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @param mixed $realName
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }

    /**
     * @return mixed
     */
    public function getConnectTime()
    {
        return $this->connectTime;
    }

    /**
     * @param mixed $connectTime
     */
    public function setConnectTime($connectTime)
    {
        $this->connectTime = $connectTime;
    }

    /**
     * @return mixed
     */
    public function getRegisterTime()
    {
        return $this->registerTime;
    }

    /**
     * @param mixed $registerTime
     */
    public function setRegisterTime($registerTime)
    {
        $this->registerTime = $registerTime;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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
    } // -1 = Ban, 0 = Non activate, 1 = pending, 2 = activate
}