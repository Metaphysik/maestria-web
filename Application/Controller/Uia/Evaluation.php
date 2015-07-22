<?php


namespace Application\Controller\Uia;


use Application\Controller\Api;
use Application\Entities\User;
use Application\Model\Domain;
use Application\Model\Item;
use Application\Model\Question;
use Application\Model\Theme;
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

    public function showAction($evaluation_id)
    {
        $evaluation             = new \Application\Model\Evaluation();
        $evaluation             = $evaluation->get($evaluation_id);
        $this->data->evaluation = $evaluation['evaluation'];
        $this->data->questions  = $evaluation['questions'];

        $this->select_evaluation($evaluation_id);

        $this->greut->render();
    }

    public function destroyAction($uia, $evaluation_id)
    {
        $model      = new Question();
        $questions  = $model->getByEvaluation($evaluation_id);
        $evaluation = new \Application\Model\Evaluation();
        $eval       = $evaluation->get($evaluation_id);
        $eval       = $eval['evaluation'];


        foreach ($questions as $question) {
            $model->delete($question);
        }

        $evaluation->delete($eval);
        $this->redirector->redirect('indexUiaEvaluation', ['uia' => $uia]);
    }

    public function editAction($evaluation_id)
    {
        $evaluation            = new \Application\Model\Evaluation();
        $evaluation            = $evaluation->get($evaluation_id);
        $this->data->domain    = new Domain();
        $this->data->theme     = new Theme();
        $this->data->item      = new Item();
        $this->data->eval      = $evaluation['evaluation'];
        $this->data->questions = $evaluation['questions'];

        $this->no_evaluation();
        $this->greut->render();
    }

    public function updateAction($uia, $evaluation_id)
    {
        /**
         * @var $evaluation \Application\Entities\Evaluation
         * @var $questions Array
         * @var $question \Application\Entities\Question
         */

        $mevaluation = new \Application\Model\Evaluation();
        $mquestion   = new Question();
        $stack       = $mevaluation->get($evaluation_id);
        $evaluation  = $stack['evaluation'];
        $questions   = $stack['questions'];
        $title       = $this->checkPost('title');
        $q           = $this->computeQuestion($_POST);
        
        if ($title === null) {
            throw new Exception('API Error on create evaluation');
        }

        $evaluation->setTitle($title);
        $evaluation->setUpdatedate(time());

        // Update
        foreach ($questions as $k => $question) {
            if (isset($q[$question->getId()]) === true) {
                $value = $q[$question->getId()];

                if ($value['title'] !== $question->getTitle()) {
                    $question->setTitle($value['title']);
                }

                if ($value['taxo'] !== $question->getTaxo()) {
                    $question->setTaxo($value['taxo']);
                }

                if ($value['note'] !== $question->getPoint()) {
                    $question->setPoint($value['note']);
                }

                if ($value['item1'] !== $question->getItem1id()) {
                    $question->setItem1($value['item1']);
                }

                if ($value['item2'] !== $question->getItem2id()) {
                    $question->setItem2($value['item2']);
                }

                unset($q[$question->getId()]);
            }
            // update model
            $mevaluation->update($question);
        }

        // insert question
        $newQuestion = new Question();
        foreach ($q as $question) {
            $title = $question['title'];
            $taxo  = $question['taxo'];
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

            $newQuestion->insert($evaluation_id, $title, $taxo, $point, $item1, $item2);
        }


        $this->redirector->redirect('showUiaEvaluation', ['uia' => $uia, 'evaluation_id' => $evaluation_id]);
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
                if (preg_match('#q(\-?[0-9]+)_(.*)#', $key, $m) > 0) {
                    $number = intval($m[1]);
                    $title  = $m[2];
                    $store($number, $title, $value);
                }
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

    public function newAction()
    {
        $this->data->domain = new Domain();
        $this->data->theme  = new Theme();
        $this->data->item   = new Item();

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

        if ($this->_user instanceof User) {
            $evaluation->insert($uia, $this->_user->getId(), $title);
        }

        if ($evaluation->id === null) {
            throw new Exception('Evaluation are not created');
        }

        $mQuestion = new Question();
        $mQuestion->insertMany($evaluation->id, $question);

        $this->redirector->redirect('indexUiaEvaluation', ['uia' => $uia]);
    }

}