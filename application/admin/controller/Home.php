<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

use app\index\model\HomeUser as homeUserModel;
use app\common\validate\HomeUser as HomeUserValidate;
/**
* 
*/
class Home extends Common
{
	
	function home()
	{
		$homeUserModel = new homeUserModel();
		$result = $homeUserModel->select();
		$this->assign('result',$result);
		return view();
	}


	function add()
	{
		if(request()->isPost())
		{
			$data['username'] = input('username');
			$data['password'] = input('password');
			$data['re_password'] = input('re_password');

			$validate = new HomeUserValidate;
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}

			$homeUserModel = new homeUserModel;
			$homeUserModel->username = $data['username'];
			$homeUserModel->password = $data['password'];
			$save = $homeUserModel->save();
			if($save) {
				return $this->success('修改成功！','Home/home');
			} else {
				return $this->error('失败！');
			}
		}
		return view();
	}


	public function edit($id)
	{
		if(request()->isPost()) {
			$data['id'] = input('id');
			$data['username'] = input('username');
			$data['password'] = input('password');
			$data['re_password'] = input('re_password');

			$validate = new HomeUserValidate;
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}

			$homeUserModel = new homeUserModel;
			$result = $homeUserModel->where('id',$data['id'])->find();
			$result->username = $data['username'];
			$result->password = $data['password'];
			$save = $result->save();
			if($save) {
				return $this->success('修改成功！','Home/home');
			}  else {
				return $this->error('失败！');
			}
		}
		$id = input('id');
		$homeUserModel = new homeUserModel;
		$result = $homeUserModel->where('id',$id)->select();
		$this->assign('result',$result);

		return $this->fetch();
	}

	public function del($id)
	{
		$result = homeUserModel::destroy($id);
		if($result) {
			return $this->success('成功！');
		} else {
				return $this->error('失败！');
		}
	}



















}