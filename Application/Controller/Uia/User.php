<?php


namespace Application\Controller\Uia;

use Application\Controller\Api;
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

    public function updateActionAsync($user_id)
    {
        if (isset($_POST['name'])) {

            $realName = $_POST['name'];
            $user = new \Application\Model\User();
            $login = $user->formatRealName($realName);

            /**
             * @var $entity \Application\Entities\User
             */
            $entity = $user->get($user_id);

            $entity->setRealName($realName);
            $entity->setLogin($login);
            $entity->setEmail($login.'@nowhere.com');
            $entity->setPassword(sha1('student'));

            $user->update($entity);

        } else {
            $this->nok('api error');
        }


        echo $this->getApiJson();
    }

    public function destroyActionAsync($user_id)
    {
        $user = new \Application\Model\User();
        /**
         * @var $entity \Application\Entities\User
         */
        $entity = $user->get($user_id);


        if($entity->isStudent() === true)
        {
            $user->delete($entity);
        }
        else {
            $this->nok('You cant delete an student with this method');
        }

        echo $this->getApiJson();
    }
}