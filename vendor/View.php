<?php
namespace vendor;

class View
{
    public $variables = array();
    public $_controller;
    public $_action;
    public $_layout;

    public function __construct($controller, $action)
    {
        $this->_controller = strtolower($controller);
        $this->_action     = strtolower($action);
    }

    public function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function display($layout = '')
    {
        extract($this->variables);
        $this->_layout = empty($layout) ? $this->_action : $layout;
        $layoutFile = APP_PATH . 'app/views/'.$this->_controller.'/'.$this->_layout.'.html';
        if (!file_exists($layoutFile)) {
            die('无视图文件');
        }
        require($layoutFile);
    }
}
