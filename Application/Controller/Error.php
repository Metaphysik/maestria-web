<?php

namespace Application\Controller;

use Sohoa\Framework\Kit;

/**
 * Default controller class for error handling
 */
class Error extends Kit
{

    public function notfoundAction($class, $message, $file, $line)
    {
        $this->data->class = $class;
        $this->data->message = $message;
        $this->data->file = $file;
        $this->data->line = $line;

        $this->greut->render();
    }

    public function exceptionAction($class, $message, $file, $line)
    {
        $this->data->class = $class;
        $this->data->message = $message;
        $this->data->file = $file;
        $this->data->line = $line;

        $this->greut->render();
    }

    public function exceptionActionAsync()
    {
        var_dump('d');
    }

}
