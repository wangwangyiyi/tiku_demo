<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\controller\Common;

/**
* 
*/
class SaleList extends Common
{
	function saleList()
	{
		// $cateArticleModel = new cateArticleModel;
		$result = db('sale_desc')->join('cate_article','sale_desc.cate_id=cate_article.id')->field('sale_desc.*,cate_article.name,cate_article.desc')
					->select();

	
		
		$this->assign('result',$result);
		return view();
	}


	function add()
	{
		
			if(request()->isPost())
		{
			$data['start_time'] = input('start_time');
			$data['end_time'] = input('end_time');
			$data['price'] = input('price');
			$data['title'] = input('title');
			$data['create_time'] = time();
			$data['cate_id'] = input('cate_id');
			$data['status'] = input('status');
		
			$file = $_FILES["pic"]["tmp_name"];
			$name = rand().substr($_FILES["pic"]["name"],strrpos($_FILES["pic"]['name'],'.'));
			$data['pic'] = $name;

			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			$vipValidate = new vipValidate();
			if(!$vipValidate->check($data)){
				return $this->error($vipValidate->getError());
			}
			$result = db('sale_desc')->insert($data);
			if($result){
				return $this->success('成功!','Vip/vip');
			}else{
				return $this->error('失败');
			}
			

		}

	// $cateArticleModel = new cateArticleModel;
	$result = db('cate_article')->join('catename','cate_article.cate_id=catename.id')
			->field('cate_article.*,catename.catename')
			->select();
		$this->assign('result',$result);
		return view();
	}
	function edit()
	{
		if(request()->isPost())
		{
			$id=input('id');
			$data['start_time'] = input('start_time');
			$data['end_time'] = input('end_time');
			$data['price'] = input('price');
			$data['title'] = input('title');
			$data['create_time'] = time();
			$data['cate_id'] = input('cate_id');
			$data['status'] = input('status');

			$file = $_FILES["pic"]["tmp_name"];
			$name = rand().substr($_FILES["pic"]["name"],strrpos($_FILES["pic"]['name'],'.'));
			$data['pic'] = $name;
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}

			$vipValidate = new vipValidate();
			if(!$vipValidate->check($data)){
				return $this->error($vipValidate->getError());
			}


			$result = db('sale_desc')->where('id',$id)
						->update([
							'start_time' => input('start_time'),
							'end_time' => input('end_time'),
							'price' => input('price'),
							'title' => input('title'),
							'create_time' => time(),
							'cate_id' => input('cate_id'),
							'status' => input('status'),
							'pic' =>	$data['pic'],
						]);
			if($result){
				return $this->success('成功!','Vip/vip');
			}else{
				return $this->error('失败');
			}
			

		}
		$result = db('cate_article')->join('catename','cate_article.cate_id=catename.id')
			->field('cate_article.*,catename.catename')
			->select();
		$this->assign('result',$result);
		return view();
	}
	function del()
	{
		$result = db('sale_desc')->where('id',input('id'))->delete();
		if($result){
			return $this->success('成功！','Vip/vip');
			}else{
				return $this->error('失败！');
			}
		return view();
	}






}