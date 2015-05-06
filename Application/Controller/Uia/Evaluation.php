<?php


namespace Application\Controller\Uia;


use Application\Controller\Api;
use Hoa\Core\Exception\Exception;

class Evaluation extends Api
{
    public function indexAction()
    {
        $this->greut->render();
    }

    public function newAction()
    {
        $this->greut->render();
    }

    public function createAction($uia)
    {
        $title = $this->checkPost('title');
        $date = $this->checkPost('date');

        if($title === null or $date === null)
            throw new Exception('');


    }
}