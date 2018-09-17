<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\validate\Auth as authValidate;
/**
* 
*/
class Auth extends Controller
{
	
	function auth()
	{
		// $authGroupType = db('auth_group')->field('type')->select();
		// 		foreach ($authGroupType as $k => $v) {
		// 			$authType = implode(',', $v);
		// 			var_dump($authType);
		// 		}
		// 		exit;

		$authRule = db('auth_group')
					->select();
		$this->assign('authRule',$authRule);

		return view();
	}


	function add()
	{
		if(request()->isPost())
		{
			$data = input('post.');
			var_dump($data);
			$data['type'] = implode(',',$data['type']);
			$data['name'] = input('name');
			$data['time'] = time();

			$validate = new authValidate();
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}
			

			$authGroup = db('auth_group')->insert($data);
			if($authGroup) {
				return $this->success('添加成功！','Auth/Auth');
			} else {
				return $this->error('失败！');
			}
		}
		$authRule = db('auth_rule')->select();
		$this->assign('authRule',$authRule);
		return view();
	}


	public function edit($id)
	{
		if(request()->isPost()) {

			$data = input('post.');
			$data['type'] = implode(',',$data['type']);
			$data['name'] = input('name');
			$data['time'] = time();
			$data['id'] = input('id');


			$validate = new authValidate;
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}
	
			$validate = new authValidate();
			$result = $validate->check($data);
			if(!$result) {
				return $this->error($validate->getError());
			}

			$save = db('auth_group')
			->update($data);
			if($save) {
				return $this->success('修改成功！','Auth/Auth');
			}
		}

		$authRule = db('auth_rule')->select();
		$this->assign('authRule',$authRule);
		$id = input('id');
		$result = db('auth_group')->where('id',$id)->select();
		$this->assign('result',$result);

		return $this->fetch();
	}

	public function del($id)
	{
		$id = input('id');
		$result = db('auth_group')->where('id',$id)->delete();
		if($result) {
			return $this->success('成功！');
		}
	}



















}