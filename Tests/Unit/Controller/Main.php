<?php
namespace Application\Controller\Tests\Unit {

    class Main extends \atoum\test
    {
        public function beforeTestMethod($testMethod)
        {
            $this->define->request = '\Camael\Api\Tests\Unit\Asserters\Request';
        }

        // index   => List all users
        public function testIndex()
        {
            $this->function->exit = null;
            $request = $this->request;
            $html    = $request->get('/')->html;

            $this
                ->if($item = $html->xquery('//div')[0])
                ->variable($item)           ->isNotNull()
                ->object($item)             ->isInstanceOf('\DOMElement')
                ->string($item->nodeValue)  ->contains('Maestria')
            ;
        }
    }
}
