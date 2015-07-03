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

        // data.log[0] = name
        // data.log[1] = next
        // data.log[2] = previous

        $log = [
            0 => [
                'id'              => 111111,
                'name'            => 'Julien is the best'.rand(),
                'currentevalname' => 'PUISSANCE'
            ],
            1 => [
                'id'   => 111111,
                'name' => 'Mel the teacher'
            ],
            2 => [
                'id'   => 52222,
                'name' => 'Allan is the worst'
            ]
        ];


        $a = [];

        for ($i = 0; $i <= 10; $i++) {
            $a[] = [
                'id'      => rand(),
                'title'   => 'Definition de la puissance'.rand(),
                'taxo'    => 'Comprendre', // Un int ?
                'item1'   => 'aaa ....',
                'item2'   => 'bbb ....',
                'note'    => rand(1,15),
                'current' => rand(-1, 2) // -1 Non rep, 0=C , 1=B, 2=A

            ];
        }

        $this->log($log);
        $this->data($a);

        echo $this->getApiJson();

    }
}