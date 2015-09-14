<?php

namespace Application\Controller\Uia;

use Application\Controller\Api;

class Question extends Api
{
    public function DeleteActionAsync($qid)
    {
        $question = new \Application\Model\Question();
        $entite = $question->get($qid);

        var_dump($entite);
        if ($entite instanceof \Application\Entities\Question && $entite->getId() === intval($qid)) {
            $question->delete($entite);
            $this->ok();
        } else {
            $this->nok();
        }

        echo $this->getApiJson();
    }
}
