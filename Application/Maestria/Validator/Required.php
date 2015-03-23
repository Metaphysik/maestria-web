<?php
namespace Application\Maestria\Validator;

class Required extends Validator
{
    protected function _valid($data, $arguments)
    {
        return (isset($data) === true && $data !== null);
    }

    protected function setMessage()
    {
        return 'This field is required';
    }

}

