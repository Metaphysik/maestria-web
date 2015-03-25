<?php


namespace Application\Controller\Uia;

use Application\Controller\Api;

class Classroom extends Api
{
    public function indexAction($uia)
    {
        $model = new \Application\Model\Classroom();
        $this->data->classes = $model->getBySlug($uia);
        $this->data->userByClasses = $model->getStudentOrderByClasses($uia);

        $this->greut->render();
    }

    public function createActionAsync($uia)
    {
        if (isset($_POST['label'])) {
            if (strlen($_POST['label']) > 2) {
                $label = $_POST['label'];

                $model = new \Application\Model\Classroom();
                $model->insert($uia, $label);

                $this->ok($label);
            } else {
                $this->nok('class name must be contains 2 chars');
            }
        } else {
            $this->nok('Label input not exists');
        }


        echo $this->getApiJson();

    }
}