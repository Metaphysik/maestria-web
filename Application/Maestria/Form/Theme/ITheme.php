<?php
namespace Application\Maestria\Form\Theme {
    use Application\Maestria\Form\Form;

    interface ITheme
    {
        public function form(Form $form);
    }
}
