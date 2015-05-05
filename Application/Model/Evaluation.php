<?php


namespace Application\Model;


class Evaluation extends Generic
{

    public function titleExists($title) {

        $e = $this->_repository->findBy(['title' => $title], null, 1);

        return (count($e) >= 1);
    }

    public function insert($uia, $userid, $title)
    {
        if($this->titleExists($title) === false)
            return $this->_insert($uia, $userid, $title, time(), time());

        return false;
    }


    protected function _insert($uia, $userid, $title, $cdate, $udate)
    {
        $eval = new \Application\Entities\Evaluation();
        $eval->setUia($uia);
        $eval->setRefuser($userid);
        $eval->setTitle($title);
        $eval->setCreatedate($cdate);
        $eval->setUpdatedate($udate);


        $this->_em->persist($eval);
        $this->_em->flush();

        $this->id = $eval->getId();

        return true;
    }
}
