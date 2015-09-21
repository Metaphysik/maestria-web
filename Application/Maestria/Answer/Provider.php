<?php


namespace Application\Maestria\Answer;


use Hoa\Core\Exception\Exception;

class Provider
{
    protected $_answers   = [];
    protected $_questions = [];

    public function setAnswers($answers)
    {
        if (count($answers) === 1) {
            /**
             * @var $answer \Application\Entities\Answer
             */
            $answer         = $answers[0];
            $answer         = $answer->getAnswer();
            $this->_answers = json_decode($answer, true);
        }
    }


    public function setQuestions($questions)
    {
        /**
         * @var $question \Application\Entities\Question
         */
        foreach ($questions as $question) {
            $this->_questions[$question->getId()] = $question;
        }

    }

    public function getAnswers()
    {
        return $this->_answers;
    }

    public function getQuestions()
    {
        return $this->_questions;
    }
}