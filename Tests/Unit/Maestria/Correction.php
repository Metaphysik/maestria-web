<?php

namespace Tests\Unit\Application\Maestria\Answer;

use Application\Model\Answer;
use Application\Model\Item;
use Application\Model\Question;

class Correction extends \atoum\test
{
    public function testFoo()
    {
        $uia = 1;
        $user = 1;
        $eval = 1;

        $questions = new Question();
        $answer = new Answer();
        $items = new Item();

        $correction = new \Application\Maestria\Answer\Correction();
        $correction->setQuestions($questions->getByEvaluation($eval));
        $correction->setAnswers($answer->getAnswer($uia, $user, $eval));
        $correction->setItems($items->all());

        $correction->run();

    }
}