<?php

namespace Application\Maestria\Form\Theme;

class Generic
{
    protected $_form = null;
    protected $_errors = [];

    public function getForm()
    {
        return $this->_form;
    }

    public function setForm($form)
    {
        $this->_form = $form;
    }

    public function setErrors(array $error)
    {
        $this->_errors = $error;
    }

    public function getError($name)
    {
        if ($this->hasError($name) === true) {
            return $this->_errors[$name];
        }

        return;
    }

    public function hasError($name)
    {
        if (array_key_exists($name, $this->_errors) === false) {
            return false;
        }

        foreach ($this->_errors[$name] as $value) {
            if ($value !== null) {
                return true;
            }
        }

        return false;
    }
}
