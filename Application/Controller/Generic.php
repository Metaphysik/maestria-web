<?php

namespace Application\Controller;

use Application\Model\Uia;
use Sohoa\Framework\Kit;

class Generic extends Kit
{
    protected $_uia;

    public function construct()
    {
        $this->readUia();
    }

    protected function readUia()
    {
        $rule       = &$this->router->getTheRule();
        $variables  = $rule[6];
        $_uia       = isset($variables['uia']) ? $variables['uia'] : 'demo';
        $uia        = new Uia();
        $uia        = $uia->getBySlug($_uia);
        $this->_uia = $uia;
    }
}
