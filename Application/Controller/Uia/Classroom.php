<?php


namespace Application\Controller\Uia;

use Application\Controller\Api;

class Classroom extends Api
{
    public function indexAction()
    {
        $this->greut->render();
    }

    public function createActionAsync($uia)
    {
        if(isset($_POST['label']))
        {
            $label = $_POST['label'];
            $this->ok($label);
        }
        else {
            $this->nok('Label input not exists');
        }


        echo $this->getApiJson();

    }
}