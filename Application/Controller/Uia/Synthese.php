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
        $classroom = 1;
//        $uid        = $this->_uia->getId();
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
        $this->greut->render();
    }

    protected function render($uia, $correction_id = null)
    {
        $classe              = new Classroom();
        $this->data->classes = $classe->getBySlug($uia);
        if ($correction_id !== null) {
            $this->data->correction = $correction_id;
        }
    }

//    protected function
}
