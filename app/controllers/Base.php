<?php
/*
 * @Author: 172999@gmail.com
 */
use Yaf\Controller_Abstract;
class BaseController extends Controller_Abstract
{
	protected $returnCode;
	protected $returnMsg;
	protected $resp;
	protected $responseStyle = 'json';
	protected function init() {
		//if($this->getRequest()->isXmlHttpRequest()) {
		Yaf\Dispatcher::getInstance()->disableView();
		//}
		$this->returnCode = StatusCode::OK;
		$this->returnMsg = 'OK';
		$this->resp = $this->getResponse();
	}

	protected function response($data = [], $returnCode = false, $returnMsg = false) {
		$body = [
			'ret' => $returnCode ?: $this->returnCode,
			'msg' => $returnMsg ?: $this->returnMsg,
			'stime' => time(),
		];
		if(!empty($data)) {
			$body = $body + (is_array($data) ? $data : [$data]);
		}
		//TODO 默认Json格式返回
		switch($this->responseStyle) {
			case 'json' :
				$this->resp->setHeader('Content-Type', 'application/json; charset=utf-8');
				$this->resp->setBody(json_encode($body));
				$this->resp->response();
			break;
		}
		exit;
	}
}