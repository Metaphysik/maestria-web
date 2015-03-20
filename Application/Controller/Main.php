<?php

namespace Application\Controller;

use Application\Form\Login;
use Sohoa\Framework\Kit;

class Main extends Generic
{
    public function indexAction()
    {
        $login            = new Login(['d' => 'babab23', 'ds' => '122aaaa0001']);
        echo  $login;
        $data             = $login->getData();

        var_dump($data);
        // var_dump($login->isValid(), $data);
        //return $this->greut->render();
    }
}

