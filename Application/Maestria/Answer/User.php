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

            $correction = new \Application\Maestria\Answer\Correction();
            $correction->setProvider($provider);

            $this->_evaluations[$eval->getRefEval()] = $correction;
        }
    }

    public function getCollection()
    {
        return $this->_evaluations;
    }

    public function getNoteTaxo() {
        // TODO : implement this
    }

}