<?php

/**
 * Se mettre d'accord sur la doc.
 */

namespace Application\Maestria;

class Router extends \Sohoa\Framework\Router
{
    protected static $_everLoad = false;

    public static function getDomain()
    {
        return 'demo.maestria.dev';
    }

    public function construct()
    {
        if (static::$_everLoad === false) {
            parent::construct();
            static::$_everLoad = true;
        }
    }
}
