<?php


namespace Application\Model;


class User extends Generic
{

    public function getByLogin($login)
    {
        return $this->getBy('login', $login);
    }

    public function connectByLogin($login, $password, $uia = null)
    {
        if ($uia === null) {
            $slug = new Uia();
            $uia  = $slug->getBySludId(UIA);
        }

        $e = $this->_repository->findBy(['refUia' => $uia, 'login' => $login, 'password' => $password], null, 1);

        return (count($e) >= 1);
    }

    public function connectByEmail($email, $password, $uia = null)
    {
        if ($uia === null) {
            $slug = new Uia();
            $uia  = $slug->getBySludId(UIA);
        }

        $e = $this->_repository->findBy(['refUia' => $uia, 'email' => $email, 'password' => $password], null, 1);

        return (count($e) >= 1);
    }

    public function getByEmail($email, $uia = null)
    {
        if ($uia === null) {
            $slug = new Uia();
            $uia  = $slug->getBySludId(UIA);
        }

        return $this->_repository->findBy(['refUia' => $uia, 'email' => $email], null, 1)[0];
    }

    public function insert(
        $uia,
        $login,
        $email,
        $password,
        $isAdmin,
        $isModerator,
        $isProfessor,
        $realName,
        $connectTime,
        $registerTime,
        $token,
        $status
    ) {

        $slug = new Uia();
        $slug = $slug->getBySlug($uia);
        $uia  = $slug->getId();


        if ($this->loginExist($login, $uia) === false and $this->emailExist($email, $uia) === false) {
            return $this->_insert($uia, $login, $email, $password, $isAdmin, $isModerator, $isProfessor, $realName,
                $connectTime, $registerTime, $token, $status);
        }

        return false;
    }

    public function loginExist($login, $uia = null)
    {
        if ($uia === null) {
            $uia = UIA;
        }
        $e = $this->_repository->findBy(['refUia' => $uia, 'login' => $login], null, 1);

        return (count($e) >= 1);
    }

    public function emailExist($email, $uia = null)
    {
        if ($uia === null) {
            $uia = UIA;
        }
        $e = $this->_repository->findBy(['refUia' => $uia, 'email' => $email], null, 1);

        return (count($e) >= 1);
    }

    protected function _insert(
        $uia,
        $login,
        $email,
        $password,
        $isAdmin,
        $isModerator,
        $isProfessor,
        $realName,
        $connectTime,
        $registerTime,
        $token,
        $status
    ) {
        $user = new \Application\Entities\User();
        $user->setRefUia($uia);
        $user->setLogin($login);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setIsAdmin($isAdmin);
        $user->setIsModerator($isModerator);
        $user->setIsProfessor($isProfessor);
        $user->setRealName($realName);
        $user->setConnectTime($connectTime);
        $user->setRegisterTime($registerTime);
        $user->setToken($token);
        $user->setStatus($status);

        $this->_em->persist($user);
        $this->_em->flush();

        return true;
    }
}
