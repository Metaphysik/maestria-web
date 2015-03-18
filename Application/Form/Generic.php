<?php
namespace Application\Form;


class Generic
{
    public function form()
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
        return null;
    }

    public function withValidation()
    {
        return null;
    }
}