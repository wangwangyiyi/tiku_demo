<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\validate\AuthRule as authRuleValidate;
use app\admin\controller\Common;

/**
* 
*/
class AuthAccess extends Common
{
	
	function AuthAccess()
	{
		$result = db('auth_rule')->select();
		$this->assign('result',$result);
		return view();
	}


	function add()
	{
		if(request()->isPost())
		{
			$data['name'] = input('name');
			$data['type'] = input('type');
			$data['time'] = time();

			$validate = new authRuleValidate();
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}

			$authGroup = db('auth_rule')->insert($data);
			if($authGroup) {
				return $this->success('添加成功！','AuthRule/AuthRule');
			} else {
				return $this->error('失败！');
			}
		}

		$admin_user = db('admin_user')->select();
		$this->assign('admin_user',$admin_user);
		$authGroup = db('authGroup')->select();
		$this->assign('authGroup',$authGroup);




		return view();
	}


	public function edit($id)
	{
		if(request()->isPost()) {
			$data['id'] = input('id');
			$data['name'] = input('name');
			$data['type'] = input('type');

			$validate = new authRuleValidate();
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}

			$save = db('auth_rule')
			->update($data);
			if($save) {
				return $this->error('修改成功！','AuthRule/authRule');
			}
		}
		$id = input('id');
		$result = db('auth_rule')->where('id',$id)->select();
		$this->assign('result',$result);

		return $this->fetch();
	}

	public function del($id)
	{
		$id = input('id');
		$result = db('auth_rule')->where('id',$id)->delete();
		if($result) {
			return $this->success('成功！');
		}
	}



















}