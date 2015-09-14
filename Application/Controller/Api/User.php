<?php

namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Model\Classroom;

class User extends _Api
{
    public function IndexActionAsync($uia, $classe)
    {
        $classroom = new Classroom();
        $classroom = $classroom->getStudentOrderByClasses($uia);

        if (array_key_exists($classe, $classroom)) {
            $formatClassroom = [];

            foreach ($classroom[$classe] as $entity) {
                /*
                 * @var $entity \Application\Entities\User
                 */
                $formatClassroom[] = [
                    'id' => $entity->getId(),
                    'name' => $entity->getRealName(),
                    'book' => 0,
                    'rotate' => 0,
                    'wrench' => 0,
                    'star' => 0,
                    'note' => 60,
                ];
            }

            $this->log($formatClassroom);
            $this->ok();
        } else {
            $this->nok('Classe %s not exists', [$classe]);
        }

        echo $this->getApiJson();
    }
}
