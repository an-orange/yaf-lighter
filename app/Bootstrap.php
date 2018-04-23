<?php
/*
 * @Author: 172999@gmail.com
 */
use Yaf\Bootstrap_Abstract;
use Yaf\Application;
use Yaf\Registry;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
class Bootstrap extends Bootstrap_Abstract
{
	public function _initLoader() {
		\Yaf\Loader::import(APP_PATH . '/vendor/autoload.php');
	}

	public function _initRoute() {
		//打开Dispatcher的捕获异常的设置
		if(!ENV_TEST) {
			\Yaf\Dispatcher::getInstance()->catchException(true);
		}
	}

	public function _initConfig(\Yaf\Dispatcher $dispatcher) {
		$this->config = Application::app()->getConfig();
		Registry::set('config', $this->config);
	}

	public function _initDefaultDbAdapter() {
		$capsule = new Manager;
		$capsule->addConnection($this->config->database->toArray());
		$capsule->setEventDispatcher(new Dispatcher(new Container));
		$capsule->setAsGlobal();
		//开启Eloquent ORM
		$capsule->bootEloquent();
		class_alias('\Illuminate\Database\Capsule\Manager', 'DB');
	}
}