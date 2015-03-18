<?php
namespace Application\Form;

use Application\Maestria\Form\Form;
use Application\Maestria\Validator;

class Generic
{

    protected $_name     = 'login';
    protected $_form     = null;
    protected $_validate = null;


    public function __construct()
    {
        $class           = get_class($this);
        $id              = substr($class, strrpos($class, '\\') + 1);
        $id              = strtolower($id);
        $this->_name     = $id;
        $this->_form     = Form::get($id);
        $this->_validate = Validator::get($id);

        $this->form();
        $this->validate();
    }

    public function form()
    {
        return null;
    }

    public function validate()
    {
        return null;
    }

    public function __invoke($data = null)
    {
        if ($data === null) {
            return $this->noValidation();
        } else {
            return $this->withValidation($data);
        }
    }

    public function noValidation()
    {
        return $this->_form->render();
    }

    public function withValidation($data)
    {
        $this->_form->setData($data);
        $this->_validate->setData($data);

        return $this->_form->render();
    }
}