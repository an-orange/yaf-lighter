<?php
define('APP_PATH', realpath(dirname(__FILE__).'/'));
//测试OR线上环境标记
define('ENV_TEST', ini_get('yaf.environ') == 'product' ? false : true );
$app = new \Yaf\Application(APP_PATH . '/conf/app.ini');
$app->bootstrap()->getDispatcher()->dispatch(new \Yaf\Request\Simple());