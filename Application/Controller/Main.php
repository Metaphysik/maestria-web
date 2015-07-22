<?php

namespace Application\Controller;

use Application\Form\Login;
use Application\Model\Classroom;
use Application\Model\Uia;
use Application\Model\User;
use Hoa\Core\Exception\Exception;
use Hoa\Session\Session;
use Sohoa\Framework\Kit;

class Main extends Generic
{

    public function allAction()
    {
        header('Content-Type: text/html; charset=utf-8');
        echo '<b>You must visit an Etablissement link</b> <i>' . UIA . '</i>' . '<br/>';

        $uia = new Uia();
        echo '<ul>';
        foreach ($uia->all() as $a) {
            /**
             * @var $a \Application\Entities\Uia
             */
            echo '<li>' . $a->getName() . ' : ' . $a->getSlug() . '</li>';

        }
        echo '</ul>';
    }

    public function indexAction($uia)
    {

        if ($this->isConnected() === false) {
            $this->redirector->redirect('mainconnect', ['uia' => $uia]);
        }


        $classe              = new Classroom();
        $this->data->classes = $classe->getBySlug($uia);

        $this->greut->render();
    }

    public function loginAction($uia)
    {
        $login = new Login($_POST);

        if ($login->isValid() === true) {
            $email    = $login->getData()['mail'];
            $password = $login->getData()['mdp'];
            $user     = new User();
            $valid    = $user->connectByEmail($email, sha1($password));

            if ($valid === true) {
                /**
                 * @var $user \Application\Entities\User
                 */
                $user               = $user->getByEmail($email);
                $session            = new Session('user');
                $session['connect'] = true;
                $session['id']      = $user->getId();
                $session['user']    = $user;

                $this->redirector->redirect('mainindex', ['uia' => $uia]);

            } else {
                throw new Exception('Credential are not valid');
            }
        } else {
            throw new Exception('Form are not valid');
        }

    }

    public function connectAction()
    {
        $this->greut->render();
    }

    public function logoutAction($uia)
    {
        $session            = new Session('user');
        $session['connect'] = false;
        $session['id']      = null;
        $session['user']    = [];

        Session::destroy();


        return $this->redirector->redirect('mainindex', ['uia' => $uia]);

    }

    public function errorAction()
    {
        echo 'aaaaa';
    }
}

