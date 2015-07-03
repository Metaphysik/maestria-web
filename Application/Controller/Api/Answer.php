<?php


namespace Application\Controller\Api;

use Application\Controller\Api as _Api;

class Answer extends _Api
{
    public function GetActionAsync($uia, $eval, $user)
    {

        /**
         * Definition de la puissance
         * Comprendre
         * Item 1
         * Item 2
         * Note
         */


        $array = [
            'title' => 'Definition de la puissance',
            'taxo' => 'Comprendre', // Un int ?
            'item1' => 'aaa ....',
            'item2' => 'bbb ....',
            'note' => 0 // -1 Non rep, 0=C , 1=B, 2=A

        ];

        $this->log($array);

        echo $this->getApiJson();

    }
}