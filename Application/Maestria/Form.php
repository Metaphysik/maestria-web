<?php
namespace Application\Maestria;

use Application\Maestria\Validator;

/**
 * Class Form
 * @package Application\Form
 */
class Form
{

    /**
     * @var string
     */
    protected $_name = 'login';
    /**
     * @var null
     */
    protected $_form = null;
    /**
     * @var null|object
     */
    protected $_validate = null;


    /**
     * @param  $data Array
     * @throws \Application\Maestria\Form\Exception
     */
    public function __construct($data = [])
    {
        $class           = get_class($this);
        $id              = substr($class, strrpos($class, '\\') + 1);
        $id              = strtolower($id);
        $this->_name     = $id;
        $this->_form     = \Application\Maestria\Form\Form::get($id);
        $this->_validate = Validator::get($id);

        $this->_form->setValidator($this->_validate);

        $this->setData($data);
        $this->form();
        $this->validate();

        call_user_func_array([$this, 'construct'], func_get_args());
    }

    /**
     * @return null
     */
    public function form()
    {
        return null;
    }

    /**
     * @return null
     */
    public function validate()
    {
        return null;
    }

    public function construct()
    {

    }

    /**
     * @param null $data
     * @param bool $check
     * @return mixed
     */
    public function __invoke($data = null, $check = true)
    {
        if ($check === true) {
            $this->_form->check();

            return $this->withValidation($data);
        } else {
            if ($data === null) {
                $this->_form->nocheck();

                return $this->noValidation();
            } else {
                $this->setData($data);
                $this->_form->nocheck();

                return $this->noValidation();
            }
        }

    }

    public function __toString()
    {
        return $this->__invoke();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function withValidation($data)
    {
        $this->setData($data);

        return $this->_form->render();

    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        if($data !== null){
            $this->_validate->setData($data);
            $this->_form->setData($this->_validate->getData());
        }
    }

    /**
     * @return mixed
     */
    public function noValidation()
    {
        return $this->_form->render();

    }

    public function isValid($data = [])
    {
        if (empty($data) === false) {
            $this->setData($data);
        }



        return $this->_validate->isValid();
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->_validate->getData();
    }

    /**
     * @return null
     */
    public function getForm()
    {
        return $this->_form;
    }

    /**
     * @return null|object
     */
    public function getValidator()
    {
        return $this->_validate;
    }
}