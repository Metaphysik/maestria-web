<?php

namespace Application\Controller;

use Application\Form\Login;
use Sohoa\Framework\Kit;

class Main extends Generic
{
    public function indexAction()
    {
        $login            = new Login();
        echo  $login(['d' => 'babab23', 'ds' => '122aaaa0001']);
        $data             = $login->getData();

        var_dump($login->isValid(), $data);
    }
}

