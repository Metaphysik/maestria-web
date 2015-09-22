<?php

namespace Application\Maestria;

class Maestria extends \Sohoa\Framework\Framework
{
    public    $_router;
    protected $_acl;

    public function getAcl()
    {
        return $this->_acl;
    }

    public function setAcl()
    {
        $this->_acl = new Acl($this);

        $this->_acl
            ->allow('app.(.*)', [
                'student',
                'professor',
                'moderator',
                'admin',
            ])//->deny('app.evaluation.edit', array('student', 'professor', 'moderator', 'admin'))
        ; //TODO : Make it :D
    }

    public function initView()
    {
        if (!$this->_view) {
            $this->_view = new Greut();
        }

        $this->_view->setFramework($this);

        return $this;
    }


}
