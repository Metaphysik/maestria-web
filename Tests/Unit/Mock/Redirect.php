<?php
namespace Camael\Api\Tests\Unit\Mock;

class Redirect extends \Application\Controller\Kit\Redirection
{
    protected $dispatcher = null;
    protected $fwk        = null;

    public function __construct($framework)
    {
        $this->dispatcher = $framework->getDispatcher();
        $this->fwk        = $framework;
    }

    public function url($uri, $status = 302)
    {

        return;
    }

    public function redirect($ruleId, array $data = [], $secured = null, $status = 302)
    {
        $uri = $this->router->unroute($ruleId, $data, $secured);
        $this->route($uri);

        return;
    }

    protected function route($url, $method = 'get', $keepOutput = false)
    {
        if ($keepOutput === false) {
            ob_end_clean();
            ob_start();
        }

        $base = ['http://', $this->router->getDomain()];
        $url  = str_replace($base, '', $url);

        $this->router->getMockController()->getMethod = $method;
        $this->router->route($url);
        $this->dispatcher->dispatch($this->router, $this->view, $this->fwk);
        $this->view->getOutputStream()->truncate(0);
        $this->view->reset();
    }

}