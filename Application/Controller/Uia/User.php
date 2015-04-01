<?php


namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Controller\Exception\NotAllow;
use Application\Model\UserClass;

class User extends Api
{
    public function createActionAsync($uia)
    {
        if (isset($_POST['label']) and isset($_POST['idclass'])) {

            $this->log('Label : %s', $_POST['label']);
            $this->log('Id : %s', $_POST['idclass']);

            if (strlen($_POST['label']) > 2) {
                $label = $_POST['label'];
                $id = $_POST['idclass'];

                $model = new \Application\Model\User();
                $bool = $model->insertStudent($uia, $label);

                if ($bool === true and $model->id !== null) {
                    $m = new UserClass();
                    $m->associate($uia, $id, $model->id);
                    $this->ok($label);
                } else {
                    $this->nok('User exists %s', [$label]);
                }
            } else {
                $this->nok('class name must be contains 2 chars');
            }
        } else {
            $this->nok('api error');
        }

        echo $this->getApiJson();
    }

    public function editAction($user_id)
    {
        /**
         * @var $user \Application\Entities\User
         */
        $user_id = intval($user_id);
        $m_user = new \Application\Model\User();
        $user = $m_user->get($user_id);
        $this->data->profil = $user;




        if ($this->lvlProf() || ($this->_user !== null && $this->_user->getId() === $user->getId())) {
            $this->greut->render();
        } else {
            throw new NotAllow('You attempt to acces on user.edit page with a acces level too low');
        }


    }

    public function updateAction($user_id)
    {
        $user_id = intval($user_id);
        $m_user = new \Application\Model\User();
        $user = $m_user->get($user_id);


        if ($this->lvlProf() || ($this->_user !== null && $this->_user->getId() === $user->getId())) {


            $realname = $this->checkPost('name');
            $login = $this->checkPost('login');
            $bday = $this->checkPost('birthdate');
            $email = $this->checkPost('email');
            $psswd = trim($this->checkPost('psswd'));
            $cpsswd = trim($this->checkPost('cpsswd'));
            $isAdmin = $this->checkPost('isAdmin', 'off');
            $isModo = $this->checkPost('isModo', 'off');
            $isProf = $this->checkPost('isProf', 'off');

            /**
             * @var $user \Application\Entities\User
             */

            var_dump($user);

            if ($realname !== null && $user->getRealName() !== $realname) {
                $user->setRealName($realname);
            }

            if ($login !== null && $user->getLogin() !== $login) {
                $user->setLogin($login);
            }
//        if($bday !== null && $user->getBirthdate() !== $bday)
//        {
//            $user->setBirthdate($bday)
//        }

            if ($email !== null && $user->getEmail() !== $email) {
                $user->setEmail($email);
            }

            if ($psswd !== null && $cpsswd !== null && $psswd === $cpsswd && $psswd !== '') {
                $user->setPassword(sha1($psswd));
            }

            if ($this->_user !== null && $this->_user->getIsAdmin() === true) {
                if ($isAdmin === 'on') {
                    $user->setIsAdmin(1);
                }
                else {
                    $user->setIsAdmin(0);
                }

                if ($isModo === 'on') {
                    $user->setIsModerator(1);
                }
                else {
                    $user->setIsModerator(0);
                }

                if ($isProf === 'on') {
                    $user->setIsProfessor(1);
                }
                else {
                    $user->setIsProfessor(0);
                }
            }

            $m_user->update($user);

            $this->redirector->redirect('editUiaUser', ['user_id' => $user_id]);

        } else {
            throw new NotAllow('You attempt to acces on user.edit page with a acces level too low');
        }

    }

//    public function updateActionAsync($user_id)
//    {
//        if (isset($_POST['name'])) {
//
//            $realName = $_POST['name'];
//            $user = new \Application\Model\User();
//            $login = $user->formatRealName($realName);
//
//            /**
//             * @var $entity \Application\Entities\User
//             */
//            $entity = $user->get($user_id);
//
//            $entity->setRealName($realName);
//            $entity->setLogin($login);
//            $entity->setEmail($login.'@nowhere.com');
//            $entity->setPassword(sha1('student'));
//
//            $user->update($entity);
//
//        } else {
//            $this->nok('api error');
//        }
//
//
//        echo $this->getApiJson();
//    }

    public function destroyActionAsync($user_id)
    {
        $user = new \Application\Model\User();

        if ($user->pendingTrash($user_id) === false) {
            $this->nok('You cant delete an student with this method');
        }

        echo $this->getApiJson();
    }
}