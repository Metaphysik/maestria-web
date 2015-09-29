<?php

namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Model\Classroom;
use Application\Model\User;
use Application\Model\UserClass;

class Synthese extends Api
{
    public function indexAction($uia)
    {
        $classroom         = 1;
        $user              = new User();
        $usersclass        = new UserClass();
        $users             = $usersclass->getAllBy('refClassroom', $classroom);
        $this->data->users = [];
        $this->data->uid   = [];

        foreach ($users as $u) {
            /**
             * @var $u \Application\Entities\UserClass
             */
            $this->data->users[] = $user->get($u->getRefUser());
            $this->data->uid[]   = $u->getRefUser();
        }

        $this->render($uia);
        $this->greut->render();
    }

    protected function render($uia)
    {
        $classe              = new Classroom();
        $this->data->classes = $classe->getBySlug($uia);
    }
}
