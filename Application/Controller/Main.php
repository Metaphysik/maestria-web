<?php

namespace Application\Controller;

use Application\Form\Login;
use Sohoa\Framework\Kit;

class Main extends Generic
{
    public function indexAction()
    {
        $login            = new Login();
        $this->data->html = $login(['d' => 'babab23', 'ds' => '0000'], true);
        $data             = $login->getData();




        return $this->greut->render();
    }
}

