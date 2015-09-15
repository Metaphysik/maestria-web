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

        if (empty($answers) === false) {
            $answer = $answers[0];
            $answers = json_decode($answer->getAnswer(), true);

            foreach ($answers as $q => $note) {
                $sort_answers[$q] = $note;
            }
        }

        foreach ($question_iterator as $question) {
            /*
             * @var $question \Application\Entities\Question
             */

            $a[] = [
                'id' => $question->getId(),
                'title' => $question->getTitle(),
                'taxo' => $question->getTaxo(),
                // Un int ?
                'item1' => $question->getItem1(),
                'item2' => $question->getItem2(),
                'note' => $question->getPoint(),
                'current' => (isset($sort_answers[$question->getId()])) ? $sort_answers[$question->getId()] : -1,
                // -1 Non rep, 0=C , 1=B, 2=A
            ];
        }
        // var_dump($users);

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
