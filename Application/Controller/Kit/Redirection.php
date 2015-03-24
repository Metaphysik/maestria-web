<?php
namespace Application\Controller\Kit;

use Sohoa\Framework\Kit\Redirector;

class Redirection extends Redirector
{
    public function url($uri, $status = 302)
    {
        $response = $this->view->getOutputStream();
        $response->sendHeader('Location', $uri, true, $status);

        return;
    }

    public function redirect($ruleId, array $data = [], $secured = null, $status = 302)
    {
        $uri = $this->router->unroute($ruleId, $data, $secured);

        $response = $this->view->getOutputStream();
        $response->sendHeader('Location', $uri, true, $status);

        return;
    }
}
