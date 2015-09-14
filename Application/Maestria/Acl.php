<?php

namespace Application\Maestria;

class Acl
{
    /**
     * @var \Hoa\Acl\Acl
     */
    protected $_acl = null;
    protected $_framework = null;
    protected $_resource = [];

    public function __construct(\Sohoa\Framework\Framework $framework)
    {
        $this->_acl = \Hoa\Acl\Acl::getInstance();
        $this->_framework = $framework;

        $admin = new \Hoa\Acl\Group('admin');
        $professor = new \Hoa\Acl\Group('professor');
        $moderator = new \Hoa\Acl\Group('moderator');
        $student = new \Hoa\Acl\Group('student');
        $resource = new \Hoa\Acl\Service('foo');

        if ($this->_acl->groupExists('admin') === false) {
            $this->_acl->addGroup($admin);
        }

        if ($this->_acl->groupExists('professor') === false) {
            $this->_acl->addGroup($professor);
        }

        if ($this->_acl->groupExists('moderator') === false) {
            $this->_acl->addGroup($moderator);
        }

        if ($this->_acl->groupExists('student') === false) {
            $this->_acl->addGroup($student);
        }

        if ($this->_acl->serviceExists('foo') === false) {
            $this->_acl->addService($resource);
        }

        $this->load();
    }

    protected function load()
    {
        $router = $this->_framework->getRouter();
        $router->construct();
        $rules = $router->getRules();

        foreach ($rules as $rule) {
            $call = null;
            $action = null;

            if (isset($rule[4])) {
                $call = $rule[4];
            }

            if (isset($rule[5])) {
                $action = $rule[5];
            }

            if ($call !== null and $action !== null) {
                $app = 'app.'.strtolower($call).'.'.strtolower($action);

                if (!in_array($app, $this->_resource)) {
                    $this->_resource[] = $app;
                }
            }
        }
    }

    public function allow($string, $gid)
    {
        foreach ($this->_resource as $ressource) {
            if (preg_match('#^'.$string.'$#', $ressource) !== 0) {
                if (is_array($gid)) {
                    foreach ($gid as $g) {
                        $this->_acl->allow($g, new \Hoa\Acl\Permission($ressource));
                    }
                } else {
                    $this->_acl->allow($gid, new \Hoa\Acl\Permission($ressource));
                }
            }
        }

        return $this;
    }

    public function deny($string, $gid)
    {
        foreach ($this->_resource as $ressource) {
            if (preg_match('#^'.$string.'$#', $ressource) !== 0) {
                if (is_array($gid)) {
                    foreach ($gid as $g) {
                        $this->_acl->deny($g, new \Hoa\Acl\Permission($ressource));
                    }
                } else {
                    $this->_acl->deny($gid, new \Hoa\Acl\Permission($ressource));
                }
            }
        }

        return $this;
    }

    public function isAllow($uid, $resource)
    {
        return $this->_acl->isAllowed($uid, $resource, 'foo');
    }

    public function getAcl()
    {
        return $this->_acl;
    }

    public function addUser($label, $group)
    {
        $user = new \Hoa\Acl\User($label);
        $resource = $this->_acl->getResource('foo');
        $user->addGroup($group);

        if ($this->_acl->userExists($user) === false) {
            $this->_acl->addUser($user);
        }

        if ($resource->userExists($user) === false) {
            $resource->addUser($user);
        }

        return $this;
    }
}
