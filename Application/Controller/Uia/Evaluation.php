<?php


namespace Application\Controller\Uia;


use Application\Controller\Api;
use Application\Model\Question;
use Hoa\Core\Exception\Exception;

class Evaluation extends Api
{
    public function indexAction()
    {
        $evaluations             = new \Application\Model\Evaluation();
        $evaluations             = $evaluations->all();
        $this->data->evaluations = $evaluations;

        $this->greut->render();
    }

    public function newAction()
    {
        $this->greut->render();
    }

    public function createAction($uia)
    {
        $title = $this->checkPost('title');
        $date  = $this->checkPost('date');

        if ($title === null or $date === null) {
            throw new Exception('API Error on create evaluation');
        }

        $question = $this->computeQuestion($_POST);


        $evaluation = new \Application\Model\Evaluation();
        $evaluation->insert($uia, $this->_user->getId(), $title);

        if ($evaluation->id === null) {
            throw new Exception('Evaluation are not created');
        }

        $mQuestion = new Question();
        $mQuestion->insertMany($evaluation->id, $question);


        $this->redirector->redirect('indexUiaEvaluation', ['uia' => $uia]);
    }

    protected function computeQuestion($post)
    {
        $questions = [];

        $store = function ($i, $key, $value) use (&$questions) {
            $default = [
                'title' => '',
                'taxo'  => 0,
                'note'  => 0,
                'item1' => 0,
                'item2' => 0
            ];

            if (isset($questions[$i]) === false) {
                $questions[$i] = $default; // Generate default information
            }

            $questions[$i][$key] = $value;  // Store information
        };

        // Compute question to build an array of all information

        foreach ($post as $key => $value) {
            if ($key[0] === 'q') {
                preg_match('#q([0-9]+)_(.*)#', $key, $m);
                $number = intval($m[1]);
                $title  = $m[2];

                $store($number, $title, $value);
            }
        }

        // Validate questions

        foreach ($questions as $i => $question) {
            if (isset($question['title']) === false or $question['title'] === '') {
                unset($questions[$i]);
            }
        }

        return $questions;
    }

}