<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Cate as cateModel;
use app\admin\controller\Common;

/**
* 
*/
class Cate extends Common
{
	
	function cate()
	{
		return view();
	}


	function add()
	{
		if(request()->isPost())
		{
			$data['catename_p_id'] = input('catename_p_id');
			$data['catename'] = input('catename');

			$cateModel = new cateModel;
			$cateModel->add($data);
		}
		return view();
	}



}