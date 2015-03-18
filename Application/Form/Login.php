<?php
namespace Application\Form;

use Application\Maestria\Form\Input;

class Login extends Generic
{
    public function form()
    {
        $form        = $this->_form;
        $form['foo'] = (new Input())->label('Babr')->id('d');
    }

    public function validate()
    {
        $validate = $this->_validate;
        $validate->d->required();
    }
}