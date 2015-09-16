<?php

namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Model\Answer;
use Application\Model\Classroom;
use Application\Model\Question;
use Application\Model\User;
use Application\Model\UserClass;

class Correction extends _Api
{
    public function GetAction($uia, $classe, $correction)
    {
        $this->GetActionAsync($uia, $classe, $correction);
    }

    public function GetActionAsync($uia, $classe, $correction)
    {
        $uid      = $this->_uia->getId();
        $m_class  = new UserClass();
        $m_user   = new User();
        $m_answer = new Answer();
        $users    = $m_class->getAllBy('refClassroom', $classe);
        $data     = [];


        if (count($users) > 0) {

            foreach ($users as $userclass) {

                /**
                 * @var $user \Application\Entities\User
                 * @var $userclass \Application\Entities\UserClass
                 */
                $user   = $m_user->get($userclass->getRefUser());
                $a      = [
                    'name' => $user->getRealName(),
                    'note' => 5,
                    'appr' => 'Foobar',
                    'taxo' => [1, 5, 1, 6],
                    'item' => [
                        ['name' => 'Fooo', 'note' => 1],
                        ['name' => 'Fooo', 'note' => 1],
                        ['name' => 'Fooo', 'note' => 1],
                        ['name' => 'Fooo', 'note' => 1],
                        ['name' => 'Fooo', 'note' => 1],
                        ['name' => 'Fooo', 'note' => 1],
                        ['name' => 'Fooo', 'note' => 1],
                        ['name' => 'Fooo', 'note' => 1]
                    ]
                ];
                $data[] = $a;

            }

            $this->log($data);
        } else {
            $this->nok('Class not exists');
        }

        echo $this->getApiJson();


        /**
         * Dans une lib à part
         * Recherche les réponses à l'éval pour chaque éléves
         * Calculer la note (brut et avec le coefficient)
         * Trié les réponses par taxo (Comprendre, Analyser)
         * Calculer les notes correspondantes
         * __construct($eval_id)
         * getRawNote
         * getCoeffNote
         * getItemsRawNote()
         * getItemsCoeffNote()
         * getItems()
         */
    }
}
