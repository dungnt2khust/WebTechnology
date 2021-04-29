<?php
class Controller {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;

	function __construct($model, $controller, $action) {

		$this->_controller = $controller; // controller = items
		$this->_action = $action; //action = viewall
		$this->_model = $model; // model = Item

		$this->$model =new $model; //model = new Item
		$this->_template =new Template($controller,$action); //Template(items, viewall)

	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {
			$this->_template->render();
	}

}
