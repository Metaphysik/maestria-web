<?php

namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Maestria\Answer\Aggregate;


class Correction extends _Api
{
    public function GetAction($uia, $classe, $correction)
    {
        $this->GetActionAsync($uia, $classe, $correction);
    }

    public function GetActionAsync($uia, $classe, $correction)
    {

        $uid  = $this->_uia->getId();
        $data = Aggregate::get($uid, $classe, $correction);

        if (empty($data) === false) {
            $this->log($data);
        } else {
            $this->nok('No data');
        }

        echo $this->getApiJson();
    }
}
