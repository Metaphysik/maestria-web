<?php

namespace Application\Maestria\Form;

class Checkbox extends Select
{
    protected $_name = 'input';
    protected $_attributes = ['type' => 'checkbox'];

    public function option($value, $label, $name, $args = [])
    {
        $this->_options[] = [$value, $label, $name, $args];

        return $this;
    }

    public function name()
    {
        throw new Exception('Can not define an name or id of checkbox', 0);
    }

    public function validate()
    {
        throw new Exception('Can not define an validator on checkbox', 1);
    }

    public function getAllName()
    {
        $o = [];

        foreach ($this->getOptions() as $value) {
            $o[] = $value[2];
        }

        return $o;
    }
}
