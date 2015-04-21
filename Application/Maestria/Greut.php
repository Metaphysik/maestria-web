<?php
namespace Application\Maestria;

class Greut extends \Sohoa\Framework\View\Greut
{
    public function reset()
    {
        $this->_blocks = [];
        $this->_blocknames = [];
        $this->_headers = [];
        $this->_file = '';
    }

    public function getFramework()
    {
        return $this->_framework;
    }

    public function getFilenamePath($filename)
    {
        if (preg_match('#^(?:[/\\\\]|[\w]+:([/\\\\])\1?)#', $filename) !== 1) {
            $filename = $this->_paths.$filename;
        }

        $filename = str_replace('\\' , '/', $filename);

        $resolve = resolve($filename, false);
        $realpath = realpath($resolve); // We need to use resolve beacause realpath dont use stream wrapper

        if ((false === $realpath) || !(file_exists($realpath))) {
            throw new \Sohoa\Framework\Exception('Path '.$filename.' ('.(($realpath === false) ? 'false' : $realpath).') not found in '.$resolve.'!');
        }

        return $realpath;
    }
}
