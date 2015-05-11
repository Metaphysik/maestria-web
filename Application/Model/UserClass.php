<?php
/**
 * Created by PhpStorm.
 * User: camael
 * Date: 25/03/15
 * Time: 20:35
 */

namespace Application\Model;


class UserClass extends Generic
{

    public function associate($uia, $classe, $user)
    {

        if ($uia === null) {
            $uia = UIA;
        }
        if (is_string($uia) === true) {
            $slug = new Uia();
            $uia  = $slug->getBySludId($uia);
        }


        if ($this->isAssociated($uia, $classe, $user) === false) {
            return $this->_insert($uia, $classe, $user);
        }

        return false;
    }

    public function isAssociated($uia, $classe, $user)
    {
        if ($uia === null) {
            $uia = UIA;
        }
        if ($uia === null) {
            $slug = new Uia();
            $uia  = $slug->getBySludId($uia);
        }

        $e = $this->_repository->findBy(['refUia' => $uia, 'refClassroom' => $classe, 'refUser' => $user], null, 1);

        return (count($e) >= 1);
    }

    protected function _insert($uia, $classe, $user)
    {
        $uc = new \Application\Entities\UserClass();

        $uc->setRefUia($uia);
        $uc->setRefClassroom($classe);
        $uc->setRefUser($user);

        $this->_em->persist($uc);
        $this->_em->flush();

        return true;
    }


}