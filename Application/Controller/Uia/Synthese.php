<?php

namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Maestria\Answer\Aggregate;
use Application\Model\Classroom;

class Synthese extends Api
{
    public function indexAction($uia)
    {
        $uid  = $this->_uia->getId();
        $data = Aggregate::get($uid, 1, 1);


        foreach($data as $e)
            echo $e['name'].'<br />';

//        $this->render($uia);
//        $this->greut->render();
    }

    protected function render($uia, $correction_id = null)
    {
        $classe              = new Classroom();
        $this->data->classes = $classe->getBySlug($uia);
        if ($correction_id !== null) {
            $this->data->correction = $correction_id;
        }
    }


}
