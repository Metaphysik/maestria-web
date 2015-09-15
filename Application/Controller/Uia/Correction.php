<?php

namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Model\Classroom;

class Correction extends Api
{
    public function showAction($uia,$correction_id)
    {
        $classe = new Classroom();
        $this->data->classes = $classe->getBySlug($uia);
        $this->greut->render();
    }
}
