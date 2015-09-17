<?php

namespace Tests\Unit\Application\Maestria\Answer;

use Application\Maestria\Answer\Provider;

class Correction extends \atoum\test
{
    public function testFoo()
    {
        // Classe 1�S
        $uia = 1;
        $user = 27;
        $eval = 7;

        $questions = new \mock\Application\Model\Question();
        $answer = new \mock\Application\Model\Answer();

        $questions->getMockController();
        $questions->getByEvaluation = function () {
            return 'fpp';
        };

        var_dump($questions->getByEvaluation());

        $provider = new Provider();
        $provider->setQuestions($questions->getByEvaluation($eval));
        $provider->setAnswers($answer->getAnswer($uia, $user, $eval));

        $correction = new \Application\Maestria\Answer\Correction();
        $correction->setProvider($provider);

//        var_dump($correction->getGlobalNote());
//        var_dump($correction->getNoteItem());
        var_dump($correction->getNoteTaxo(true));




    }
    public function testFoobar()
    {
//        // Classe 1�S
//        $uia = 1;
//        $user = 27;
//        $eval = 7;
//
//        $questions = new Question();
//        $answer = new Answer();
//        $items = new Item();
//
//        $correction = new \Application\Maestria\Answer\Correction();
//        $correction->setQuestions($questions->getByEvaluation($eval));
//        $correction->setAnswers($answer->getAnswer($uia, $user, $eval));
//        $correction->setItems($items->all());



    }
}