<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 21/09/15
 * Time: 22:25
 */

namespace Application\Maestria\Answer;

use Application\Model\Answer;
use Application\Model\Question;

class User
{
    protected $_evaluations = [];

    public function __construct($uia, $uid)
    {

        $answer = new Answer();
        $evals  = $answer->getUserAnswer($uia, $uid);

        foreach ($evals as $eval) {
            /**
             * @var $eval \Application\Entities\Answer
             */
            $questions = new Question();
            $provider  = new Provider();
            $provider->setQuestions($questions->getByEvaluation($eval->getRefEval()));
            $provider->setAnswers($eval);

            $correction = new Correction();
            $correction->setProvider($provider);

            $this->_evaluations[$eval->getRefEval()] = $correction;
        }
    }

    public function getCollection()
    {
        return $this->_evaluations;
    }

    public function getNoteTaxo()
    {
        /**
         * @var $e \Application\Maestria\Answer\Correction
         */
        $taxo = [];
        foreach ($this->_evaluations as $e) {
            $t = $e->getNoteTaxoAverage();
            foreach ($t as $i => $a) {
                $taxo[$i][] = $a;
            }
        }

        foreach ($taxo as $id => $value) {
            $taxo[$id] = array_sum($value) / count($value);
        }

        return $taxo;
    }

    public function getNote()
    {
        /**
         * @var $e \Application\Maestria\Answer\Correction
         */
        $note = [];
        foreach ($this->_evaluations as $e) {
            $note[] = $e->getNote();
        }

        if (count($note) >= 1) {
            return (array_sum($note) / count($note));
        }

        return 0;
    }

    public function getSuccessRate()
    {
        /**
         * @var $e \Application\Maestria\Answer\Correction
         */
        $rate = [];
        foreach ($this->_evaluations as $e) {
            $rate[] = $e->getSuccessRate();
        }

        if (count($rate) >= 1) {
            return (array_sum($rate) / count($rate));
        }

        return 0;
    }

}