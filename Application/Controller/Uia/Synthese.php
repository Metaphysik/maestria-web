<?php

namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Model\Classroom;

class Synthese extends Api
{
    public function indexAction($uia)
    {




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
