<?php
namespace Application\Maestria\Answer;

class Correction
{
    protected $_answers   = [];
    protected $_items     = [];
    protected $_questions = [];

    public function setAnswers($answers)
    {
        $this->_answers = $answers;
    }

    public function setItems($items)
    {
        $this->_items = $items;
    }

    public function setQuestions($questions)
    {
        $this->_questions = $questions;

    }

    public function run() {

//        var_dump($this->_answers);
//        var_dump($this->_items);
        var_dump($this->_questions);

    }

}