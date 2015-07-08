<?php


namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Model\Classroom;
use Application\Model\Evaluation;
use Application\Model\Question;
use Application\Model\User;
use Application\Model\UserClass;

class Answer extends _Api
{
    public function GetActionAsync($uia, $eval, $user)
    {
        /**
         * @var $evaluation \Application\Entities\Evaluation
         * @var $current_user \Application\Entities\User
         * @var $uc \Application\Entities\UserClass
         * @var $prev \Application\Entities\User
         * @var $next \Application\Entities\User
         */

        $users        = new User();
        $current_user = $users->get($user);
        $evaluations  = new Evaluation();
        $evaluation   = $evaluations->getInformation($eval);


        /**
         * Algo pour déterminer qui est le suivant/precedent dans la liste
         */

        $classes = new Classroom();
        $classe  = $classes->getStudentOrderByClasses($uia);
        $ucs     = new UserClass();
        $uc      = $ucs->getFirstClasse($uia, intval($user));
        $uc      = $uc[0];
        $prev    = false;
        $next    = false;

        if (isset($classe[$uc->getRefClassroom()])) {
            $current_classe = $classe[$uc->getRefClassroom()];

            // Find the user, next, prev

            foreach ($current_classe as $k => $i_user) {
                /**
                 * @var $i_user \Application\Entities\User
                 */
                if ($current_user->getId() === $i_user->getId()) {

                    $prev = (isset($current_classe[$k - 1]) ? $current_classe[$k - 1] : false);
                    $next = (isset($current_classe[$k + 1]) ? $current_classe[$k + 1] : false);
                }
            }
        }


        /**
         * Fin de l'algo
         */

        $log    = [];
        $log[0] = [
            'id'              => $current_user->getId(),
            'name'            => $current_user->getRealName(),
            'currentevalname' => $evaluation->getTitle()
        ];

        if ($next !== false) {
            $log[1] = [
                'id'   => $next->getId(),
                'name' => $next->getRealName()
            ];
        }

        if ($prev !== false) {
            $log[2] = [
                'id'   => $prev->getId(),
                'name' => $prev->getRealName()
            ];
        }


        $a                 = [];
        $questions         = new Question();
        $question_iterator = $questions->getByEvaluation($eval);


        foreach ($question_iterator as $question) {
            /**
             * @var $question \Application\Entities\Question
             */

            $a[] = [
                'id'      => $question->getId(),
                'title'   => $question->getTitle(),
                'taxo'    => $question->getTaxo(), // Un int ?
                'item1'   => $question->getItem1(),
                'item2'   => $question->getItem2(),
                'note'    => $question->getPoint(),
                'current' => -1 // -1 Non rep, 0=C , 1=B, 2=A
            ];
        }

        $this->log($log);
        $this->data($a);

        echo $this->getApiJson();

        return null;

    }

    public function PostActionAsync($uia, $eval, $user)
    {
        var_dump($_POST);

    }
}