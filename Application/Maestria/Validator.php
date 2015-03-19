<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 18/03/2015
 * Time: 13:37
 */

namespace Application\Maestria;

class Validator
{
    private static $_instance = null;
    private        $_data     = [];
    private        $_current  = '';
    private        $_type     = 'validator';
    private        $_stack    = [];
    private        $_errors   = [];

    /**
     * @param $id
     * @return object Validator
     */

    public static function get($id)
    {
        if (!isset(static::$_instance[$id])) {
            static::$_instance[$id] = new Validator();
        }

        return static::$_instance[$id];
    }

    public function __get($key)
    {
        if ($key === 'validator') {
            $this->_type = 'validator';
        } elseif ($key === 'filter') {
            $this->_type = 'filter';
        } else {
            $this->_current = $key;
        }

        return $this;
    }

    public function __call($name, $args)
    {
        if ($this->_type === 'validator') {
            $instance = dnew('\Application\Maestria\Validator\\' . ucfirst($name), $args);
            $instance->setData($this->getCurrentData());
            $instance->setName($this->_current);
            $instance->setArguments($args);
        } else {
            $instance = dnew('\Application\Maestria\Filter\\' . ucfirst($name), $args);
        }

        $this->_stack[$this->_current][] = ['type' => $this->_type, 'object' => $instance, 'error' => null];

        return $this;
    }

    public function getCurrentData()
    {
        return $this->getData($this->_current);
    }

    public function getData($id = null)
    {
        $this->parseData();

        if ($id === null) {
            return $this->_data;
        }

        if (isset($this->_data[$id])) {
            return $this->_data[$id];
        }

        return null;
    }

    public function _setData($id, $value)
    {
        $this->_data[$id] = $value;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function getStack($name)
    {
        if (isset($this->_stack[$name])) {
            return $this->_stack[$name];
        }

        return null;
    }

    public function parseData()
    {
        $data = $this->_data;
        $f = function ($key) use (&$data) {
            if (isset($data[$key])) {
                return $data[$key];
            }

            return null;
        };

        foreach ($this->_stack as $name => $element) {
            foreach ($element as $i => $validate) {
                if($validate['type'] === 'filter') {
                    if(isset($this->_data[$name])) {
                        $filter = $validate['object']->filter($f($name));
                        $this->_setData($name, $filter);
                    }
                }
            }
        }
    }

    public function isValid($data = null)
    {
        $data          = ($data === null) ? $this->getData() : $data;
        $this->_errors = [];


        $f = function ($key) use (&$data) {
            if (isset($data[$key])) {
                return $data[$key];
            }

            return null;
        };

        $valid = true;

        foreach ($this->_stack as $name => $element) {
            foreach ($element as $i => $validate) {
                if($validate['type'] === 'validator') {
                    $v = $validate['object']->isValid($f($name));
                    if ($v === false) {
                        $this->_errors[$name][] = [
                            'class'   => get_class($validate['object']),
                            'message' => $validate['object']->getMessage()
                        ];
                        $valid                  = false;
                    }
                }
            }
        }

        return $valid;
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    public function getError($key)
    {
        if (isset($this->_errors[$key])) {
            return $this->_errors[$key];
        }

        return null;
    }

}
