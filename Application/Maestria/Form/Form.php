<?php
namespace Application\Maestria\Form;

class Form extends Element
{
    protected static $_instance = [];
    protected $_name = 'form';
    protected $_formid = null;
    protected $_theme = null;
    protected $_data = [];
    protected $_check = false;
    protected $_validator = null;

    private function __construct($name)
    {
        $this->_formid = $name;
    }

    public static function get($name)
    {
        if ($name === null or $name === '') {
            throw new Exception("You must get an name for the form", 0);
        }

        if (!array_key_exists($name, static::$_instance)) {
            static::$_instance[$name] = new static($name);
        }

        return static::$_instance[$name];
    }

    public function getFormId()
    {
        return $this->_formid;
    }

    public function useHttpData()
    {
        $this->setData(\Hoa\Http\Runtime::getData());

        return $this;
    }

    public function getData($name = null)
    {
        if ($name === null) {
            return $this->_data;
        }

        if (array_key_exists($name, $this->_data)) {
            return $this->_data[$name];
        }

        return null;
    }

    public function setData($data = null)
    {
        if (!empty($data) and is_array($data)) {
            $this->_data = $data;
        }

        return $this;
    }

    public function fill(array $data = [])
    {
        return $this->nocheck()->setData($data);
    }

    public function nocheck()
    {
        $this->_check = false;

        return $this;
    }

    public function check()
    {
        $this->_check = true;

        return $this;
    }

    public function getCheckStatus()
    {
        return $this->_check;
    }

    public function render($validation = false)
    {
        return $this->getTheme()->form($this, $validation);
    }

    public function getTheme()
    {
        if ($this->_theme === null) {
            $this->_theme = new Theme\Bootstrap();
        }

        return $this->_theme;
    }

    public function setTheme(\Application\Maestria\Form\Theme\ITheme $object)
    {
        $this->_theme = $object;
        $this->_theme->setForm($this);
    }

    public function isValid($data = [])
    {
        if (empty($data) === false) {
            return $this->getValidator()->isValid();
        } else {
            return $this->getValidator()->isValid($data);
        }
    }

    public function getValidator()
    {
        return $this->_validator;
    }

    public function setValidator($validate)
    {
        $this->_validator = $validate;
    }

    public function getErrors()
    {
        return $this->getValidator()->getErrors();
    }
}
