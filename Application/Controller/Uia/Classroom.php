<?php


namespace Application\Controller\Uia;


use Application\Controller\Generic;

class Classroom extends Generic 
{
    public function indexAction()
    {
        $this->greut->render();
    }
}