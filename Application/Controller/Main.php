<?php

namespace Application\Controller;

use Application\Form\Login;
use Application\Model\User;
use Hoa\Core\Exception\Exception;
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

        if ($login->isValid() === true) {
            $email    = $login->getData()['mail'];
            $password = $login->getData()['mdp'];
            $user     = new User();
            $valid    = $user->connectByEmail($email, sha1($password));

            if($valid === true) {
                // Connect
                /**
                 * @var $user \Application\Entities\User
                 */
                $user = $user->getByEmail($email);
                var_dump($user->getRealName());
            }
            else {
                throw new Exception('Credential are not valid');
            }
        }
        else {
            throw new Exception('Form are not valid');
        }

    }

    public function connectAction()
    {
        $this->greut->render();
    }

    public function logoutAction()
    {

    }
}

