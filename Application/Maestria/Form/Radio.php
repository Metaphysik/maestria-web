<?php
namespace Application\Maestria\Form;

class Radio extends Select
{
    protected $_name = 'input';
    protected $_attributes = ['type' => 'radio'];

    public function option($value, $label = null, $args = [])
    {
        $this->_options[] = [$value, $label, $args];

        return $this;
    }
}
