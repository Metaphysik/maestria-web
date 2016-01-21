<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 21/01/16
 * Time: 19:07
 */

namespace Application\Maestria\Answer;


use Application\Model\Item;
use Application\Model\Theme;
use Application\Model\User;
use Application\Model\UserClass;

class Synthese
{
    public function getAnswerByTheme($themeid)
    {

        $tmp   = [];
        $users = $this->getStudentInTheClassroom(1);
        $item  = new Item();
        $item  = $item->getByTheme($themeid);


        foreach ($users as $u) {
            /**
             * @var $u \Application\Entities\UserClass
             */
//            $uid = $this->_uia->getId();

            $uid          = 1;
            $userid       = $u->getRefUser();
            $correctionid = 1; // TODO : Do it  for all eval :/
            $provider     = Aggregate::getProvider($correctionid, $userid, $uid);
            $correction   = new Correction($provider);

            $noteByItem         = $correction->getNoteItem();
            $tmp[$correctionid] = [-1];

            foreach ($item as $t) {
                /**
                 * @var $t \Application\Entities\Item
                 */


                if (isset($noteByItem[$t->getId()]) === true) {
                    $tmp[$correctionid][] = $noteByItem[$t->getId()];
                }

            }

            $data['u' . $userid] = round(array_sum($tmp[$correctionid]) / count($tmp[$correctionid]));

        }

        return $data;

    }

    protected function getStudentInTheClassroom($classroom)
    {
        $usersclass = new UserClass();

        return $usersclass->getAllBy('refClassroom', 1);
    }

    protected function getUserInfo($id)
    {
        $user = new User();

        return $user->get($id);
    }

    public function getAnswerByDomain($domainid)
    {

        $theme = new Theme();
        $theme = $theme->getByRef($domainid);
        $data  = [];

        foreach ($theme as $t) {
            /**
             * @var $t \Application\Entities\Theme
             */

            $answer = $this->getAnswerByTheme($t->getId());

            foreach ($answer as $uid => $note) {


                if ($note >= 0) {
                    $data[$uid][] = $note;
                }
            }


        }


        return $data;
    }
}