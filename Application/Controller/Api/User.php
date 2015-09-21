<?php

namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Model\Classroom;
use Application\Model\Question;

class User extends _Api
{
    public function IndexActionAsync($uia, $classe)
    {
        $evaluations = new \Application\Maestria\Answer\User($this->_uia->getId(), 12);






//        $classroom = new Classroom();
//        $classroom = $classroom->getStudentOrderByClasses($uia);
//
//        if (array_key_exists($classe, $classroom)) {
//            $formatClassroom = [];
//
//            foreach ($classroom[$classe] as $entity) {
//                /**
//                 * @var $entity \Application\Entities\User
//                 */
//                $formatClassroom[] = [
//                    'id' => $entity->getId(),
//                    'name' => $entity->getRealName(),
//                    'connaitre' => 0,
//                    'comprendre' => 0,
//                    'appliquer' => 0,
//                    'analyser' => 0,
//                    'note' => 60,
//                ];
//            }
//
//            $this->log($formatClassroom);
//            $this->ok();
//        } else {
//            $this->nok('Classe %s not exists', [$classe]);
//        }
//
//        echo $this->getApiJson();
    }
}
