<?php
/**
 * Created by PhpStorm.
 * User: camael
 * Date: 01/04/15
 * Time: 20:04
 */

namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Model\Domain;
use Application\Model\Theme;

class Item extends Api{
    public function indexAction()
    {
        $this->data->domain = new Domain();
        $this->data->theme = new Theme();
        $this->data->item = new \Application\Model\Item();


        return $this->greut->render();
    }
}