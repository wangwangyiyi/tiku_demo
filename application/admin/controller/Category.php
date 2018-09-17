<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

use app\admin\model\Category as CategoryModel;
use app\admin\validate\Category as CategoryValidate;

/**
* 
*/
class Category extends Common
{
	public function category()
	{
		$categoryModel = new categoryModel();
		$result = $categoryModel->gettree();
		$this->assign('result',$result);
		return view();
	}
	
	function add()
	{
		if(request()->isPost())
		{
			$data['id'] = input('id');
			$data['catename'] = input('catename');
			$data['catename_p_id'] = input('catename_p_id');
			$data['time'] = time();
			$validate = new categoryValidate;
			$res = $validate->check($data);
			if(!$res)
			{
				return $this->error($validate->getError());
			}

			$categoryModel = new categoryModel();
			$addres = $categoryModel->add($data);


			if($addres == 1)
			{
				return $this->success("成功！",'indexnav');
			}
			if($addres == 0)
			{
				return $this->error("失败!");
			}
			if($addres == 2)
			{
				return $this->error("已经存在此栏目!");
			}
		}
		$categoryModel = new categoryModel();
		$result = $categoryModel->gettree();
		$this->assign('result',$result);
		return view();
	}

public function edit($id)
	{
		if(request()->isPost()) {
			$data['id'] = input('id');
			$data['catename'] = input('catename');
			$data['catename_p_id'] = input('catename_p_id');
			$data['time'] = time();
			$validate = new categoryValidate;
			$res = $validate->check($data);
			if(!$res)
			{
				return $this->error($validate->getError());
			}

			$categoryModel = new categoryModel();
			$categoryRes = $categoryModel->where('id',input('id'))
										 ->update([
											'catename' => input('catename'),
											'catename_p_id' => input('catename_p_id'),
											'time' => time(),
										 ]);
			if($categoryModel) {
				return $this->success("成功！",'category');
			} else {
				return $this->error("失败!");
			}
		}
		$id = input('id');
		$catename= db('catename')->where('id',$id)->find();
		$CategoryModel = new CategoryModel;
		$result = $CategoryModel->gettree();
		$this->assign('result',$result);
		$this->assign('catename',$catename);
		return $this->fetch();
	}

	public function del()
	{
		$id = input('id');
		$result = CategoryModel::destroy($id);
		if($result){
			return $this->success('成功！','category');
		}else{
			return $this->error('失败！');
		}
	}







}















