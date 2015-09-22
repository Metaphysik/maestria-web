<?php


namespace Application\Maestria\Answer;


use Application\Entities\Answer;

class Provider
{
    protected $_answers   = [];
    protected $_questions = [];

    public function setAnswers($answers)
    {
        if(is_array($answers) === true && count($answers) === 1) {
            $this->storeObject($answers[0]);
        }

        if(is_object($answers)) {
            $this->storeObject($answers);
        }

    }

    protected function storeObject(Answer $answer) {
        $this->_answers = json_decode($answer->getAnswer(), true);
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