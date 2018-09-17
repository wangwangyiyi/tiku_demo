<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

use app\admin\controller\AuthClass;

/**
* 
*/
class Common extends Controller
{
	public function _initialize()
	{
		
		if(empty(session('name'))){
		return $this->error('没有登录','Login/login');
		}
		$request = Request::instance();
		$controller = $request->controller();
		$action = $request->action();
 		$data = $controller.'/'.$action;

 		$init = array('Index/index','Footer/footer');
 		if(!in_array($data,$init)){
 			$auth = new AuthClass();
			$result = $auth->check($data,session('id')); 
			// if(!$result){
			// 	return $this->error('没有权限！');
			// }
		}
		
	}

}