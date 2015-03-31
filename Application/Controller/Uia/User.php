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
                $id    = $_POST['idclass'];

                $model = new \Application\Model\User();
                $bool  = $model->insertStudent($uia, $label);

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
        $user_id            = intval($user_id);
        $m_user             = new \Application\Model\User();
        $user               = $m_user->get($user_id);
        $this->data->profil = $user;


        if ($this->lvlProf() || ($this->_user !== null && $this->_user->getId() === $user->getId())) {
            $this->greut->render();
        } else {
            throw new NotAllow('You attempt to acces on user.edit page with a acces level too low');
        }


    }

    public function updateAction($user_id)
    {
        var_dump($_POST);
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