<?php


namespace Application\Controller\Uia;


use Application\Controller\Api;

class Correction extends Api {

    public function indexAction($uia) {
        $this->redirector->redirect('mainindex', ['uia' => $uia]);
    }

    public function showAction($correction_id) {

    }

}