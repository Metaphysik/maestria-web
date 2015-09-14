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
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function updateActionAsync($classroom_id)
    {
        if (isset($_POST['label'])) {
            $class = new \Application\Model\Classroom();
            /**
             * @var \Application\Entities\Classroom
             */
            $entity = $class->get($classroom_id);

            $entity->setLabel($_POST['label']);
            $class->update($entity);
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function destroyActionAsync($classroom_id)
    {
        $class = new \Application\Model\Classroom();
        $entity = $class->get($classroom_id);

        if (isset($entity)) {
            // TODO : Delete UserClass association

            $class->delete($entity);
            $this->ok();
        } else {
            $this->nok('Request invalid');
        }

        echo $this->getApiJson();
    }
}
