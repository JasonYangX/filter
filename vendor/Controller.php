<?php
namespace vendor;

use \vendor\View;

class Controller
{
    public $_controller;
    public $_action;
    public $_view;
    public $_request;

    public function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action     = $action;
        $this->_request    = $_REQUEST;
        $this->_view       = new View($controller, $action);
    }

    public function assign($name, $value)
    {
        $this->_view->assign($name, $value);
    }

    public function display($layout = '')
    {
        $this->_view->display($layout);
    }
}
