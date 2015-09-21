<?php


namespace Application\Maestria\Answer;


use Hoa\Core\Exception\Exception;

class Provider
{
    protected $_answers   = [];
    protected $_questions = [];

    public function setAnswers($answers)
    {
        /**
         * @var $answer \Application\Entities\Answer
         */
        if(is_array($answers) && count($answers) === 1) {
            $answer = $answers[0];
        }
        else {
            $answer = $answers;
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