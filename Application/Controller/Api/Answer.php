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
                'name'            => 'Julien is the best',
                'currentevalname' => 'PUISSANCE'
            ],
            1 => [
                'id'   => 111111,
                'name' => 'Julien is the best'
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
                'title'   => 'Definition de la puissance',
                'taxo'    => 'Comprendre', // Un int ?
                'item1'   => 'aaa ....',
                'item2'   => 'bbb ....',
                'note'    => 0, // -1 Non rep, 0=C , 1=B, 2=A
                'current' => rand(-1, 2)

            ];
        }

        $this->log($log);
        $this->data($a);

        echo $this->getApiJson();

    }
}