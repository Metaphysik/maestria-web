<?php
namespace Application\Form;

use Application\Maestria\Form\Form;
use Application\Maestria\Form\Input;
use Application\Maestria\Validator;

class Login extends Generic
{
    public function form($data = [])
    {
        $form        = Form::get('login');
        $form['foo'] = (new Input())->label('Hello')->name('foo');

        $validate = Validator::get('login');
        $validate->foo->required();

        $form->setData($data);
        $validate->setData($data);
    }

    public function noValidation()
    {
        $this->form();
        return Form::get('login')->render();
    }

    public function withValidation($data)
    {
        $this->form($data);
        return Form::get('login')->render(true);
    }
}