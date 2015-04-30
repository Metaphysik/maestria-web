<?php
namespace {

    use Application\Controller\Kit\Redirection;
    use Application\Maestria\Log;
    use Application\Maestria\Maestria;
    use Hoa\Core\Exception\Exception;

    require_once __DIR__ . '/../vendor/autoload.php';

    $minutes = 60;
    session_set_cookie_params($minutes * 60, '/');
    session_cache_expire($minutes);
    ini_set('session.gc_maxlifetime', $minutes * 60);

    // Fix nginx
    $_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'];

    try {
        $framework = new Maestria();

        var_dump(resolve('hoa://Application/View/Uia/Index.tpl.php'));
        $framework->kit('redirector', new Redirection());
        $framework->setAcl();

        $router = $framework->getRouter();

        Log::info(
            $router->getMethod() . ': /' . $router->getURI(),
            [
                \Hoa\Http\Runtime::getData(),
                ['async' => $router->isAsynchronous()]
            ]
        );

        $framework->run();
    } catch (\Hoa\Session\Exception\Expired $e) {

        Log::debug('Expired');
        $framework->getRouter()->route('/');
        $framework->run();

    }
//    catch (\Hoa\Router\Exception\NotFound $e) {
//        Log::error(
//            $e->getMessage(),
//            [$e->getFile() . ':' . $e->getLine() . '#' . $e->getCode()]
//        );
//
//        $framework->getRouter()->route('/error/404');
//
//        $rule = &$framework->getRouter()->getTheRule();
//        $rule[6]['class'] = get_class($e);
//        $rule[6]['message'] = $e->getMessage();
//        $rule[6]['file'] = $e->getFile();
//        $rule[6]['line'] = $e->getLine();
//
//        $framework->run();
//    }
//    catch (Exception $e) {
//
//        Log::error(
//            $e->getMessage(),
//            [$e->getFile() . ':' . $e->getLine() . '#' . $e->getCode()]
//        );
//
//        $framework->getRouter()->route('/error/exception');
//
//        $rule = &$framework->getRouter()->getTheRule();
//        $rule[6]['class'] = get_class($e);
//        $rule[6]['message'] = $e->getMessage();
//        $rule[6]['file'] = $e->getFile();
//        $rule[6]['line'] = $e->getLine();
//
//        $framework->run();
//
//    }
    catch (\Exception $e) {

        Log::error(
            $e->getMessage(),
            [$e->getFile() . ':' . $e->getLine() . '#' . $e->getCode()]
        );
        echo '<p>' . $e->getMessage() . '</p>';
    }

}
