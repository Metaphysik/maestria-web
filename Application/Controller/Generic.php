<?php

namespace Application\Controller;

use Application\Model\Uia;
use Hoa\Session\Session;
use Sohoa\Framework\Kit;

class Generic extends Kit
{
    protected $_uia;
    /**
     * @var \Application\Entities\User
     */
    protected $_user = null;
    protected $_connect = false;

    public function construct()
    {
        $this->readUia();
        $this->readUserSession();
    }

    protected function readUia()
    {
        $rule = &$this->router->getTheRule();
        $variables = $rule[6];
        $_uia = isset($variables['uia']) ? $variables['uia'] : 'demo';
        $uia = new Uia();
        $uia = $uia->getBySlug($_uia);
        $this->_uia = $uia;

        if (defined('UIA') === false) {
            define('UIA', $uia->getSlug());
        }

    }

    protected function readUserSession()
    {
        $session = new Session('user');
        if (isset($session['connect']) and $session['connect'] === true) {
            $this->_user = $session['user'];
            $this->_connect = true;
            $this->data->userIsLogin = true;
            $this->data->user = &$this->_user;
        }
    }

    protected function isConnected()
    {
        return ($this->_user !== null && $this->_connect === true);
    }

    protected function isAdmin()
    {
        if($this->_user === null)
            return false;

        return $this->_user->getIsAdmin();
    }

    protected function isModerator(){
        if($this->_user === null)
            return false;

        return $this->_user->getIsModerator();
    }

    protected function isProfessor(){
        if($this->_user === null)
            return false;

        return $this->_user->getIsProfessor();
    }

    protected function lvlAdmin()
    {
        return ($this->isAdmin() === true);
    }

    protected function lvlModo()
    {
        return ($this->isAdmin() === true || $this->isModerator() === true);
    }

    protected function lvlProf()
    {

        return ($this->isAdmin() === true || $this->isModerator() === true  || $this->isProfessor() === true);
    }

    protected function checkPost($key, $default = null)
    {
        if(isset($_POST[$key]) === true)
            return $_POST[$key];

        return $default;
    }


}
