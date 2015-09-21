<?php

namespace Application\Model;

class Answer extends Generic
{
    public function insert($uia, $user, $eval, $answer)
    {
        if (is_array($answer)) {
            $answer = json_encode($answer);
        }

        if ($this->exists($uia, $user, $eval) === false) {
            $this->_insert($uia, $user, $eval, $answer);
        } else {
        }

        return false;
    }

    public function exists($uia, $user, $eval)
    {
        if ($uia === null) {
            $uia = UIA;
        }
        if (is_string($uia) === true) {
            $slug = new Uia();
            $uia  = $slug->getBySludId(UIA);
        }
        $e = $this->_repository->findBy(['refUia' => $uia, 'refUser' => $user, 'refEval' => $eval]);

        return (count($e) >= 1);
    }

    protected function _insert($uia, $user, $eval, $answer)
    {
        $answers = new \Application\Entities\Answer();
        $answers->setRefUia($uia);
        $answers->setRefUser($user);
        $answers->setRefEval($eval);
        $answers->setAnswer($answer);

        $this->_em->persist($answers);
        $this->_em->flush();

        return true;
    }

    public function getAnswer($uia, $user, $eval)
    {
        return $this->_repository->findBy(['refUia' => $uia, 'refUser' => $user, 'refEval' => $eval]);
    }

    public function getUserAnswer($uia, $user)
    {
        return $this->_repository->findBy(['refUia' => $uia, 'refUser' => $user]);
    }

    public function modify($uia, $user, $eval, $answer)
    {
        /**
         * @var \Application\Entities\Answer
         */
        $a = $this->getAnswer($uia, $user, $eval);
        $a = $a[0];

        $a->setAnswer($answer);

        $this->update($a);
    }
}
