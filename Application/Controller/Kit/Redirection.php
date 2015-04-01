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
        if (defined('UIA') and isset($data['uia']) === false) {
            $data['uia'] = UIA;
        } else {
            if (isset($this->router->getTheRule()[6]['uia']) === true) {
                $data['uia'] = $this->router->getTheRule()[6]['uia'];
            } else {
                $data['uia'] = 'demo';
            }
        }

        $uri = $this->router->unroute($ruleId, $data, $secured);

        $response = $this->view->getOutputStream();
        $response->sendHeader('Location', $uri, true, $status);

        return;
    }
}
