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
        $classroom           = 1;
        $user                = new User();
        $this->data->users   = [];
        $this->data->uid     = [];
        $classe              = new Classroom();
        $this->data->classes = $classe->getBySlug($uia);


        $users = $classe->getStudentOrderByClasses($uia);

        foreach ($users[$classroom] as $u) {
            /**
             * @var $u \Application\Entities\User
             */
            $this->data->users[] = $user->get($u->getId());
            $this->data->uid[]   = $u->getId();
        }


        $this->greut->render();
    }

}
