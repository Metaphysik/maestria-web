<?php


namespace Application\Controller\Uia;

use Application\Controller\Api;

class User extends Api
{
    public function createActionAsync($uia)
    {
        if (isset($_POST['label'])) {
            if(strlen($_POST['label']) > 2) {
                $label = $_POST['label'];

                $model = new \Application\Model\User();
                $bool  = $model->insertStudent($uia, 'Julien CLAUZEL');

                if($bool === true)
                    $this->ok($label);
                else
                    $this->nok('User exists');
            }
            else {
                $this->nok('class name must be contains 2 chars');
            }
        } else {
            $this->nok('Label input not exists');
        }


        echo $this->getApiJson();

    }
}