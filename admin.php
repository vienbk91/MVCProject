<?php
// アプリケーションを利用する為に、基本パス定義
define('PATH_SYSTEM', __DIR__ . '/system');
define('PATH_APPLICATION', __DIR__ . '/admin');

// config.phpから構造情報を取得する
require (PATH_SYSTEM . '/config/config.php');

$segements = array(
		'controller' => '' , 
		'action'     => array()
);

/**
 * URLからコントローラー名が無いなら、デフォルートコントローラーを自動的に取得する
 *  
 */
$segements['controller'] = empty($_GET['c']) ? CONTROLLER_DEFAULT : $_GET['c'];

$segements['action'] = empty($_GET['a']) ? ACTION_DEFAULT : $_GET['a'];

// require controller
require_once PATH_SYSTEM . '/core/V_Controller.php';

// Run controller
$controller = new V_Controller();
$controller->load($segements['controller'], $segements['action']);