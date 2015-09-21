<?php

namespace Application\Model;

use Application\Entities\Item as ii;
use Hoa\Core\Exception\Exception;

class Question extends Generic
{
    public function insertMany($eval, $questions)
    {
        if (is_array($questions) === false) {
            throw new Exception('Question must be an array');
        }

        foreach ($questions as $question) {
            $title = $question['title'];
            $taxo = $question['taxo'];
            $point = $question['note'];
            $item1 = $question['item1'];
            $item2 = $question['item2'];

            if ($taxo === '') {
                $taxo = 0;
            } else {
                $taxo = intval($taxo);
            }
            if ($point === '') {
                $point = 0;
            } else {
                $point = intval($point);
            }
            if ($item1 === '') {
                $item1 = 0;
            } else {
                $item1 = intval($item1);
            }
            if ($item2 === '') {
                $item2 = 0;
            } else {
                $item2 = intval($item2);
            }

            $this->insert($eval, $title, $taxo, $point, $item1, $item2);
        }
    }

    public function getByEvaluation($idEvaluation)
    {
        return $this->getAllBy('refEvaluation', $idEvaluation);
    }

    public function insert($eval, $title, $taxo, $point, $item1, $item2)
    {
        if ($this->titleExists($eval, $title) === false) {
            $this->_insert($eval, $title, $taxo, $point, $item1, $item2);
        }

        return false;
    }

    public function titleExists($eval, $title)
    {
        $e = $this->_repository->findBy(['title' => $title, 'refEvaluation' => $eval], null, 1);

        return (count($e) >= 1);
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

    public function getAllBy($column, $value)
    {
        $entites = $this->_repository->findBy([$column => $value]);

        foreach ($entites as $i => $entite) {
            /**
             * @var $entite \Application\Entities\Question
             */

            $item = new \Application\Model\Item();
            $item1 = $item->get($entite->getItem1());
            if ($item1 !== null) {
                if ($item1 instanceof ii) {
                    $item1 = $item1->getLabel();
                    $entite->setItem1id($entite->getItem1());
                    $entite->setItem1($item1);
                }
            }

            $item2 = $item->get($entite->getItem2());
            if ($item2 !== null) {
                if ($item2 instanceof ii) {
                    $item2 = $item2->getLabel();
                    $entite->setItem2id($entite->getItem2());
                    $entite->setItem2($item2);
                }
            }
        }

        return $entites;
    }
}
