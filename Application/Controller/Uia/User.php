<?php


namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Model\UserClass;

class User extends Api
{
    public function createActionAsync($uia)
    {
        if (isset($_POST['label']) and isset($_POST['idclass'])) {

            $this->log('Label : %s' , $_POST['label']);
            $this->log('Id : %s' , $_POST['idclass']);

            if(strlen($_POST['label']) > 2) {
                $label = $_POST['label'];
                $id = $_POST['idclass'];

                $model = new \Application\Model\User();
                $bool  = $model->insertStudent($uia, $label);

                if($bool === true and $model->id !== null) {
                    $m = new UserClass();
                    $m->associate($uia, $id, $model->id);
                    $this->ok($label);
                }
                else {
                    $this->nok('User exists %s', [$label]);
                }
            }
            else {
                $this->nok('class name must be contains 2 chars');
            }
        } else {
            $this->nok('api error');
        }


        echo $this->getApiJson();

    }
}