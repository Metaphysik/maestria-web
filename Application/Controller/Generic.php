<?php

namespace Application\Controller;

use Sohoa\Framework\Kit;

class Generic extends Kit
{
    public function form($data = [])
    {
        $form        = Form::get($this->_name);
        $form['foo'] = (new Input())->label('Hello')->name('foo');

        $validate = Validator::get($this->_name);
        $validate->foo->required();

        $form->setData($data);
        $validate->setData($data);
    }

}
