<?php
class Template {

	protected $variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller,$action) {
		$this->_controller = $controller; //items
		$this->_action = $action; //viewall
	}

	/** Set Variables **/

	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	/** Display Template **/

    function render() {
		extract($this->variables); // $todo = $this->Item->selectAll() (in template.class.php)
		//$title = All items - My todo app

			if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
				//MVC-2/application/views/items/header.php
				include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php');

			} else {
				include (ROOT . DS . 'application' . DS . 'views' . DS . 'header.php');
			}

        include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');		 
			//MVC-2/application/views/items/viewall.php
			if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
				//MVC-2/application/views/items/footer.php
				include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
			} else {
				include (ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php');
			}
    }

}
