<?php

namespace Application\Controller\Api;

use Application\Controller\Api as _Api;
use Application\Maestria\Answer\Provider;
use Application\Model\Answer;
use Application\Model\Evaluation;
use Application\Model\Item;
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
//        $classe     = 1;
//        $correction = 1;
        $uid        = $this->_uia->getId();
        $m_class    = new UserClass();
        $m_user     = new User();
        $m_answer   = new Answer();
        $m_eval     = new Evaluation();
        $questions  = new Question();
        $m_item     = new Item();
        $users      = $m_class->getAllBy('refClassroom', $classe);
        $data       = [];


        if (count($users) > 0) {

            foreach ($users as $userclass) {
                /***
                 * @var $user \Application\Entities\User
                 * @var $userclass \Application\Entities\UserClass
                 */

                $provider = new Provider();
                $provider->setQuestions($questions->getByEvaluation($correction));
                $provider->setAnswers($m_answer->getAnswer($uid, $userclass->getRefUser(), $correction));

                $cor = new \Application\Maestria\Answer\Correction();
                $cor->setProvider($provider);

                $user = $m_user->get($userclass->getRefUser());
                $a    = [
                    'name' => $user->getRealName(),
                    'note' => $cor->getNote() . '/' . $cor->getGlobalNote(),
                    'appr' => $cor->getAppreciation(),
                    'taxo' => $cor->getNoteTaxo(true),
                ];

                foreach ($cor->getNoteItem() as $i => $c) {
                    /**
                     * @var $item \Application\Entities\Item
                     */

                    $item        = $m_item->get($i);
                    $a['item'][] = [
                        'name' => $item->getLabel(),
                        'note' => $c
                    ];
                }

                $data[] = $a;
            }
            $this->log($data);
        } else {
            $this->nok('Class not exists');
        }

        echo $this->getApiJson();
    }
}
