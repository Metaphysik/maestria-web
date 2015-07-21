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
    public function GetAction($uia, $eval, $user)
    {
        $this->GetActionAsync($uia, $eval, $user);
    }

    public function GetActionAsync($uia, $eval, $user)
    {
        /**
         * @var $evaluation \Application\Entities\Evaluation
         * @var $current_user \Application\Entities\User
         * @var $uc \Application\Entities\UserClass
         * @var $prev \Application\Entities\User
         * @var $next \Application\Entities\User
         * @var $answer \Application\Entities\Answer
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
        $uc      = $ucs->getFirstClasse($this->_uia->getId(), intval($user));
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
        $answers           = new \Application\Model\Answer();
        $answers           = $answers->getAnswer($this->_uia->getId(), $current_user->getId(), $evaluation->getId());
        $sort_answers      = [];

        if (empty($answers) === false) {
            $answer  = $answers[0];
            $answers = json_decode($answer->getAnswer(), true);

            foreach ($answers as $q => $note) {
                $sort_answers[$q] = $note;
            }
        }


        foreach ($question_iterator as $question) {
            /**
             * @var $question \Application\Entities\Question
             */

            $a[] = [
                'id'      => $question->getId(),
                'title'   => $question->getTitle(),
                'taxo'    => $question->getTaxo(),
                // Un int ?
                'item1'   => $question->getItem1(),
                'item2'   => $question->getItem2(),
                'note'    => $question->getPoint(),
                'current' => (isset($sort_answers[$question->getId()])) ? $sort_answers[$question->getId()] : -1
                // -1 Non rep, 0=C , 1=B, 2=A
            ];
        }

        $this->log($log);
        $this->data($a);

        echo $this->getApiJson();

        return null;

    }

    public function PostActionAsync($uia, $eval)
    {
        if (isset($_POST['elmt'])) {
            $elmt    = json_decode($_POST['elmt'], true);
            $answers = [];
            $model   = new \Application\Model\Answer();
            $user    = 0;

            foreach ($elmt as $e) {
                $match = [];
                preg_match('#u(\d+)e(\d+)q(\d+)#', $e['name'], $match);

                if (isset($match[1]) and $match[1] !== '') {
                    $answers[$match[3]] = $e['value'];

                    if ($user === 0) {
                        $user = $match[1];
                    } else {
                        if ($user !== $match[1]) {
                            $this->nok('User not match :(');
                        }
                    }
                }
            }
            if ($this->getStatusCode() === 200) {
                if ($model->exists($this->_uia->getId(), $user, $eval) === true) {
                    $model->modify($this->_uia->getId(), $user, $eval, json_encode($answers));
                } else {
                    $model->insert($this->_uia->getId(), $user, $eval, $answers);
                }
            }
        } else {
            $this->nok('Elmt key are not found !');
        }

        echo $this->getApiJson();
    }
}