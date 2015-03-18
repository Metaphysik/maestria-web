<?php

namespace Application\Controller;

use Application\Form\Login;
use Sohoa\Framework\Kit;

class Main extends Generic
{
    public function indexAction()
    {
        $login = new Login();

        echo $login(['foo' => '']);

        return $this->greut->render();
    }
}

