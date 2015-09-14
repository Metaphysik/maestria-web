<?php

namespace Application\Form;

use Application\Maestria\Form;
use Application\Maestria\Form\Input;

class Login extends Form
{
    public function form()
    {
        $form = $this->_form;
        $form[] = (new Input())->id('mail');
        $form[] = (new Input())->id('mdp');
    }

    public function validate()
    {
        $validate = $this->_validate;
        $validate->mail
            ->required()
            ->email();
        $validate->mdp
            ->required();
    }
}
