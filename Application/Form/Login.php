<?php
namespace Application\Form;

use Application\Maestria\Form;
use Application\Maestria\Form\Input;

class Login extends Form
{
    public function form()
    {
        $form   = $this->_form;
        $form[] = (new Input())->label('Babr')->id('d');
        $form[] = (new Input())->label('Babr')->id('ds');
        $form[] = (new Input())->label('Babr')->id('dsf');
    }

    public function validate()
    {
        $validate = $this->_validate;
        $validate->d->required();
        $validate->ds->required();
        $validate->dsf->required();

        $validate->d->filter->alpha();
        $validate->ds->filter->integer(['operation' => 1]);

    }
}