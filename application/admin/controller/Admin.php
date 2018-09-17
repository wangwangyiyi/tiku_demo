<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

use app\admin\model\AdminUser as adminUserModel;
use app\admin\validate\AdminUser as adminUserValidate;
/**
* 
*/
class Admin extends Common
{
	
	function admin()
	{
		$adminUserModel = new adminUserModel();
		$result = $adminUserModel->select();
		$this->assign('result',$result);
		return view();
	}


	function add()
	{
		if(request()->isPost())
		{
			$data['admin_user'] = input('admin_user');
			$data['level'] = input('level');
			$data['password'] = input('password');
			$data['re_password'] = input('re_password');

			$validate = new adminUserValidate();
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}

			$adminUserModel = new adminUserModel();
			$adminUserModel->admin_user = $data['admin_user'];
			$adminUserModel->password = $data['password'];
			$adminUserModel->level = $data['level'];
			$save = $adminUserModel->save();

			$_data['group_id'] = $data['level'];
			$_data['admin_id'] = $adminUserModel->id;
			$authAccess = db('auth_access')->insert($_data);
			if($save) {
				return $this->success('添加成功！','Admin/admin');
			} else {
				return $this->error('失败！');
			}
		}
		$authRule = db('auth_group')
					->select();
		$this->assign('authRule',$authRule);
		return view();
	}


	public function edit($id)
	{
		if(request()->isPost()) {
			$data['id'] = input('id');
			$data['admin_user'] = input('admin_user');
			$data['password'] = input('password');
			$data['level'] = input('level');

			$data['re_password'] = input('re_password');

			$validate = new adminUserValidate;
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}
		
			$result = adminUserModel::get($data['id']);
			$result->admin_user = $data['admin_user'];
			$result->password = $data['password'];
			$result->level = $data['level'];
			$save = $result->save();

			$_data['group_id'] = $data['level'];
			$_data['admin_id'] = $data['id'];
			var_dump($data);
			$authAccess = db('auth_access')->where('admin_id',$_data['admin_id'])->update($_data);

			if($save) {
				return $this->success('修改成功！','Admin/admin');
			}else{
				return $this->error('失败');
			}
		}
		$authRule = db('auth_group')
					->select();
		$this->assign('authRule',$authRule);

		$id = input('id');
		$adminUserModel = new adminUserModel;
		$result = $adminUserModel->where('id',$id)->select();
		$this->assign('result',$result);

		return $this->fetch();
	}

	public function del($id)
	{
		$result = adminUserModel::destroy($id);
		if($result) {
			return $this->success('成功！');
		}
	}



















}