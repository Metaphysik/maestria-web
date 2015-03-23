<?php
namespace Application\View\Helper;

use Sohoa\Framework\View;

class Route extends View\Helper
{
    //put your code here
    public function unroute($rid, $args = [])
    {
        $router = $this->view->getFramework()->getRouter();

        if (defined('UIA') and isset($args['uia']) === false) {
            $args['uia'] = UIA;
        }

        return $router->unroute($rid, $args);

    }

    public function __invoke($args)
    {

    }


}
