<?php

namespace Application\Controller;

use Application\Model\Uia;
use Hoa\Session\Session;
use Sohoa\Framework\Kit;

class Generic extends Kit
{
    protected $_uia;
    protected $_user    = null;
    protected $_connect = false;

    public function construct()
    {
        $this->readUia();
        $this->readUserSession();
    }

    protected function readUia()
    {
        $rule       = &$this->router->getTheRule();
        $variables  = $rule[6];
        $_uia       = isset($variables['uia']) ? $variables['uia'] : 'demo';
        $uia        = new Uia();
        $uia        = $uia->getBySlug($_uia);
        $this->_uia = $uia;

        if (defined('UIA') === false) {
            define('UIA', $uia->getSlug());
        }
    }

    protected function readUserSession()
    {
        $session = new Session('user');
        if (isset($session['connect']) and $session['connect'] === true) {
            $this->_user             = $session['user'];
            $this->_connect          = true;
            $this->data->userIsLogin = true;
            $this->data->user        = &$this->_user;

        }
    }

    protected function isConnected()
    {
        return ($this->_user !== null && $this->_connect === true);
    }


}
