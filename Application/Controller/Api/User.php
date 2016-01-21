<?php

namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Model\Classroom;

class User extends _Api
{
    public function IndexActionAsync($uia, $classe)
    {

        $classroom   = new Classroom();
        $classroom   = $classroom->getStudentOrderByClasses($uia);


        if (array_key_exists($classe, $classroom)) {
            $formatClassroom = [];


            foreach ($classroom[$classe] as $entity) {
                /**
                 * @var $entity \Application\Entities\User
                 */

                $evaluations = new \Application\Maestria\Answer\User($this->_uia->getId(), $entity->getId());
                $a = [
                    'id'         => $entity->getId(),
                    'name'       => $entity->getRealName(),
                    'connaitre'  => 0,
                    'comprendre' => 0,
                    'appliquer'  => 0,
                    'analyser'   => 0,
                    'note'       => $evaluations->getNote(),
                    'rate'       => $evaluations->getSuccessRate(),
                ];

                if (empty($evaluations->getNoteTaxo()) === false) {
                    $taxo = $evaluations->getNoteTaxo();
                    $a['connaitre'] = (isset($taxo['t1'])) ? $taxo['t1'] : 0;
                    $a['comprendre'] = (isset($taxo['t2'])) ? $taxo['t2'] : 0;
                    $a['appliquer'] = (isset($taxo['t3'])) ? $taxo['t3'] : 0;
                    $a['analyser'] = (isset($taxo['t4'])) ? $taxo['t4'] : 0;
                }

                $formatClassroom[] = $a;
            }

            $this->log($formatClassroom);
            $this->ok();
        } else {
            $this->nok('Classe %s not exists', [$classe]);
        }

        echo $this->getApiJson();
    }
}
