<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;

/**
* 
*/
class login extends Controller
{
	public function login()
	{
		if(request()->isPost())
		{
			$code = input('captcha_src');
			$captcha = new Captcha();
			if(!$captcha->check($code)){
				return $this->error('验证码错误！');
			}


			$data['admin_user'] = input('admin_user');
			$data['password'] = input('password');
			$admin_user = db('admin_user')->where('admin_user',$data['admin_user'])->find();
			if(!$admin_user) {
				return $this->error('用户名错误！');
			}  

			if($admin_user['password'] != $data['password']){
				return $this->error('密码错误！');
			} else {
				session("name",$data['admin_user']);
				session("id",$admin_user['id']);


				return $this->success('登录成功！','Index/index');
			}

		}
		return view();
	}

}