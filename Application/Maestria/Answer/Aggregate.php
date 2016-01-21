<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/15
 * Time: 22:34
 */

namespace Application\Maestria\Answer;

use Application\Maestria\Answer\Provider;
use Application\Model\Answer;
use Application\Model\Classroom;
use Application\Model\Evaluation;
use Application\Model\Item;
use Application\Model\Question;
use Application\Model\User;
use Application\Model\UserClass;
use Hoa\Core\Exception\Exception;

class Aggregate
{
    public static function get($uid, $classe, $correction)
    {

        $m_user    = new User();
        $m_answer  = new Answer();
        $questions = new Question();
        $m_item    = new Item();
        $data      = [];
        $classroom = new Classroom();
        $users     = $classroom->getStudentOrderByClasses($uid);
        $users     = $users[$classe];


        if (count($users) > 0) {

            foreach ($users as $userclass) {
                /***
                 * @var $user \Application\Entities\User
                 * @var $userclass \Application\Entities\User
                 */

                $provider = static::getProvider($correction, $userclass->getId(), $uid);
                $cor      = new \Application\Maestria\Answer\Correction();

                $cor->setProvider($provider);

                $user = $m_user->get($userclass->getId());
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


            return $data;
        } else {
            throw new Exception('Class not exists');
        }
    }

    /**
     * @param $correction
     * @param $refuser
     * @param $uid
     * @return \Application\Maestria\Answer\Provider
     */

    public static function getProvider($correction, $refuser, $uid)
    {
        $m_answer  = new Answer();
        $questions = new Question();
        $provider  = new Provider();


        $provider->setQuestions($questions->getByEvaluation($correction));
        $provider->setAnswers($m_answer->getAnswer($uid, $refuser, $correction));

        return $provider;

    }


}