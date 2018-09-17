<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

use app\admin\model\Category as CategoryModel;
use app\common\model\CateArticle as CateArticleModel;
use app\common\model\Live as LiveModel;

/**
* 
*/
class Live extends Common
{
	
	function live()
	{

		$result = db('live')
		->distinct(true)
		->join('Cate_article','live.cate_article_id=Cate_article.cate_id')
				->join('catename','Cate_article.cate_id=catename.id')
				->field('live.*,catename.catename')
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
			$data['cate_article_id'] = input('cate_article_id');
			$data['live_desc'] = input('live_desc');
			$data['time'] = time();
			$result = db('live')->insert($data);
			if($result){
				return $this->success('成功！','Live/live');
			}else{
				return $this->error('失败！');
			}
		}
		$CateArticleModel = new CateArticleModel();
		$result = $CateArticleModel->select();
		$this->assign('result',$result);
		return view();
	}

	function edit()
	{
		if(request()->isPost())
		{
			
			$result = db('live')->where('live_id',input('live_id'))->update([
				'start_time' => input('start_time'),
				'end_time' => input('end_time'),
				'cate_article_id' => input('cate_article_id'),
				'live_desc' => input('live_desc'),
				'time' =>time(),
				]);
			if($result){
				return $this->success('成功！','Live/live'); 
			}else{
				return $this->error('添加成功！');
			}
		}


		$result = db('live')
		->where('live_id',input('live_id'))
		->distinct(true)
		->join('Cate_article','live.cate_article_id=Cate_article.cate_id')
				->join('catename','Cate_article.cate_id=catename.id')
				->field('live.*,catename.catename')
				->find();
			$CateArticleModel = new CateArticleModel();
			$res = $CateArticleModel->select();
			$this->assign('res',$res);
				$this->assign('result',$result);
		return view();
	}

	function del()
	{
		$result = db('live')->where('live_id',input('live_id'))->delete();
		if($result){
			return $this->success('删除成功！');
		}else{
			return $this->error('删除失败！');
		}
		}


}























