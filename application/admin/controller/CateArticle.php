<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

use app\admin\model\Cate as cateModel;
use app\admin\model\Category as CategoryModel;
use app\common\model\CateArticle as cateArticleModel;
use app\common\validate\CateArticle as cateArticleValidate;


/**
* 
*/
class CateArticle extends Common
{
	
	function cateArticle()

	{
		// $cateArticleModel = new cateArticleModel;
		$result = db('cate_article')->join('catename','cate_article.cate_id=catename.id')->field('cate_article.*,catename.catename')
					->select();
			
	
		
		$this->assign('result',$result);
		return view();
	}


	function add()
	{
		if(request()->isPost())
		{
			$data['time'] = time();

			$data['name'] = input('name');
			$data['desc'] = input('desc');
			$data['shop'] = input('shop');
			$data['scrope'] = input('scrope');
			$data['people'] = input('people');
			$data['resource'] = input('resource');
			$data['cate_id'] = input('cate_id');

			$file = $_FILES["pic"]["tmp_name"];
			$name = rand().substr($_FILES["pic"]["name"],strrpos($_FILES["pic"]['name'],'.'));
			$data['pic'] = $name;

			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			$data['content'] = input('content');
			$cateArticleValidate = new cateArticleValidate;
			
			if(!$cateArticleValidate->check($data)){
				return $this->error($cateArticleValidate->getError());
			}
			$cateArticleModel = new cateArticleModel;
			$result = $cateArticleModel->add($data);
			if($result == 1){
				return $this->success('成功!','CateArticle/cateArticle');
			}else{
				return $this->error('失败');
			}
			

		}

		$CategoryModel = new CategoryModel();
		$result = $CategoryModel->where('catename_p_id','>',0)->select();
		$this->assign('result',$result);
		return view();
	}
	function edit()
	{
		if(request()->isPost())
		{
			$id=input('id');
			$data['time'] = time();
			$data['name'] = input('name');
			$data['desc'] = input('desc');
			$data['shop'] = input('shop');
			$data['scrope'] = input('scrope');
			$data['people'] = input('people');
			$data['resource'] = input('resource');
			$data['cate_id'] = input('cate_id');
			$data['content'] = input('content');

			$file = $_FILES["pic"]["tmp_name"];
			$name = rand().substr($_FILES["pic"]["name"],strrpos($_FILES["pic"]['name'],'.'));
			$data['pic'] = $name;
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}



			$cateArticleValidate = new cateArticleValidate;
			
			if(!$cateArticleValidate->check($data)){
				return $this->error($cateArticleValidate->getError());
			}	
			$result = db('cate_article')->where('id',$id)
						->update('post.');
			if($result){
				return $this->success('成功!','CateArticle/cateArticle');
			}else{
				return $this->error('失败');
			}
			

		}
		$id=input('id');
		$article = db('cate_article')->where('id',$id)->find();
		$this->assign('article',$article);
		$CategoryModel = new CategoryModel();
		$result = $CategoryModel->gettree();
		$this->assign('result',$result);
		return $this->fetch();
	}
	function del()
	{
		$result = db('cate_article')->where('id',input('id'))->delete();
		if($result){
			return $this->success('成功！','CateArticle/cateArticle');
			}else{
				return $this->error('失败！');
			}
		return view();
	}






















}
