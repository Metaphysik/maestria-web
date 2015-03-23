<?php

namespace Application\Controller;

use Application\Form\Login;
use Sohoa\Framework\Kit;

class Main extends Generic
{
    public function indexAction($uia)
    {
        $this->redirector->redirect('mainconnect', ['uia' => $uia]);
    }

    public function loginAction()
    {
        $login = new Login($_POST);

        var_dump($login->isValid());
    }

    public function connectAction()
    {
        $this->greut->render();
    }

    public function logoutAction()
    {

    }
}

