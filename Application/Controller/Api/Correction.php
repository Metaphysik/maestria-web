<?php

namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Model\Classroom;

class Correction extends _Api
{
    public function GetAction($uia, $classe, $correction)
    {
        $this->GetActionAsync($uia, $classe, $correction);
    }

    public function GetActionAsync($uia, $classe, $correction)
    {


        echo $this->getApiJson();
    }
}
