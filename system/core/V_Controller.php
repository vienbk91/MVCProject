<?php
if (!defined('PATH_SYSTEM')) die('Bad requested!');

class V_Controller {
	protected $view = NULL;
	protected $model = NULL;
	protected $library = NULL;
	protected $helper = NULL;
	protected $config = NULL;
	
	/**
	 * Contruct
	 * @desc 必須ライブラリーを呼び出す
	 * 
	 */
	public function __construct() {
		
	}
	
	/**
	 * アプリケーション処理の為、基本ロードメソッドを呼び出す
	 * @param string $controller
	 * @param string $action
	 */
	public function load($controller , $action) {
		// Chuyen doi ten controller
		$controller = ucfirst(strtolower($controller)) . '_Controller';
		$action = strtolower($action) . 'Action';
		
		if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')) {
			die('Controller not exist');
		}
		
		require_once PATH_APPLICATION . '/controller/' . $controller . '.php';
		
		if (!class_exists($controller)) {
			die('Controller not exist');
		}
		
		$controllerObject = new $controller();
		
		if (!method_exists($controllerObject, $action)) {
			die('Action not exist');
		}
		
		$controllerObject->{$action}();
	}
}