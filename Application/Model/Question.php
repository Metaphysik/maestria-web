<?php


namespace Application\Model;


class Evaluation extends Generic
{

    public function titleExists($eval, $title) {

        $e = $this->_repository->findBy(['title' => $title, 'refEval' => $eval], null, 1);

        return (count($e) >= 1);
    }

    public function insert($eval, $title, $taxo, $point, $item1, $item2)
    {

        if($this->titleExists($eval, $title) === false)
            $this->_insert($eval, $title, $taxo, $point, $item1, $item2);

        return false;
    }


    protected function _insert($eval, $title, $taxo, $point, $item1, $item2)
    {
        $quest = new \Application\Entities\Question();
        $quest->setRefEvaluation($eval);
        $quest->setTitle($title);
        $quest->setTaxo($taxo);
        $quest->setPoint($point);
        $quest->setItem1($item1);
        $quest->setItem2($item2);


        $this->_em->persist($quest);
        $this->_em->flush();

        $this->id = $quest->getId();

        return true;
    }
}
