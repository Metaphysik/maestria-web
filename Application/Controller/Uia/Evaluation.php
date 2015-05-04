<?php


namespace Application\Controller\Uia;


use Application\Controller\Api;

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
}