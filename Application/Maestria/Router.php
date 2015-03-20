<?php

/**
 * Se mettre d'accord sur la doc
 */
namespace Application\Maestria;

class Router extends \Sohoa\Framework\Router
{
    protected static $_restfulRoutes = [
        self::REST_INDEX   => [self::ROUTE_ACTION      => 'index',
                               self::ROUTE_VERB        => 'get',
                               self::ROUTE_URI_PATTERN => '/'
        ],
        self::REST_NEW     => [
            self::ROUTE_ACTION      => 'new',
            self::ROUTE_VERB        => 'get',
            self::ROUTE_URI_PATTERN => '/new'
        ],
        self::REST_SHOW    => [
            self::ROUTE_ACTION      => 'show',
            self::ROUTE_VERB        => 'get',
            self::ROUTE_URI_PATTERN => '/(?<%s>[^/]+)'
        ],
        self::REST_CREATE  => [
            self::ROUTE_ACTION      => 'create',
            self::ROUTE_VERB        => 'post',
            self::ROUTE_URI_PATTERN => '/'
        ],
        self::REST_EDIT    => [
            self::ROUTE_ACTION      => 'edit',
            self::ROUTE_VERB        => 'get',
            self::ROUTE_URI_PATTERN => '/(?<%s>[^/]+)/edit'
        ],
        self::REST_UPDATE  => [
            self::ROUTE_ACTION      => 'update',
            self::ROUTE_VERB        => 'post',
            self::ROUTE_URI_PATTERN => '/(?<%s>[^/]+)/update'
        ],
        self::REST_DESTROY => [self::ROUTE_ACTION      => 'destroy',
                               self::ROUTE_VERB        => 'get',
                               self::ROUTE_URI_PATTERN => '/(?<%s>[^/]+/destroy)'
        ],
    ];

    protected static $_everLoad = false;

    public function construct()
    {
        if (static::$_everLoad === false) {
            echo 'Load';
            parent::construct();
            static::$_everLoad = true;
        }

        var_dump($this->getURI());
    }
}