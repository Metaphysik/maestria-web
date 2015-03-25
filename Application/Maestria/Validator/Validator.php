<?php
namespace Application\Maestria\Validator;

class Validator
{
    protected $_name = '';
    protected $_data = null;
    protected $_arguments = [];
    private $_message = null;

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function isValid($data = null, $arguments = null)
    {
        $this->_message = null;
        $data = ($data === null) ? $this->getData() : $data;
        $arguments = ($arguments === null) ? $this->getArguments() : $arguments;
        $valid = $this->_valid($data, $arguments);

        if ($valid === false) {
            $this->_message = $this->setMessage();
        }

        return $valid;
    }

    public function getData()
    {
        return $this->_data;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function getArguments()
    {
        return $this->_arguments;
    }

    public function setArguments(Array $arguments)
    {
        $this->_arguments = $arguments;
    }

    protected function _valid($data, $arguments)
    {
        throw new Exception("You must implements your own function", 0);
    }

    public function getMessage()
    {
        return $this->_message;
    }

    protected function setMessage()
    {
        throw new Exception("You must implements your own function", 0);
    }

}

