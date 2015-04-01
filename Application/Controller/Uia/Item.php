<?php
/**
 * Created by PhpStorm.
 * User: camael
 * Date: 01/04/15
 * Time: 20:04
 */

namespace Application\Controller\Uia;

use Application\Controller\Api;

class Item extends Api{
    public function indexAction()
    {
        $this->greut->render();
    }
}