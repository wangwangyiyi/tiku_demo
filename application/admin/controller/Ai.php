<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

/**
* 
*/
class Ai extends Common
{
	
	function ai()
	{
		$ai = db('ai')->select();
		$this->assign('ai',$ai);
		return view();
	}


	function ai_add()
	{
		if(request()->isPost())
		{
			$file = $_FILES["img"]["tmp_name"];
			// $name = rand().$_FILES["logo"]['name'];
			$name = rand().substr($_FILES["img"]["name"],strrpos($_FILES["img"]['name'],'.'));
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			$data['img'] = $name;
			$data['name'] = input('name');
			$data['desc'] = input('desc');
			$data['time'] = time();

			$result = db('ai')->insert($data);
			if($result){
				return $this->success('成功！','Ai/ai');
			}else{
				return $this->error('失败！');
			}
		}
		return view();
	}

	function aiEdit()
	{
		if(request()->isPost())
		{
			$data['img'] = $_FILES['img']['name'];
			$name = rand().substr($data['img'], strrpos($data['img'], '.'));
			$upLoadFiles = move_uploaded_file($_FILES['img']['tmp_name'],
						   dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			if(!$upLoadFiles){
				return $this->error('上传失败！');
			}
			$result = db('ai')->where('id',input('id'))->update([
				'img'=> $name,
				'name' => input('name'),
				'desc' =>input('desc'),
				'time' =>time(),
				]);
			if($result){
				return $this->success('成功！','Ai/ai'); 
			}else{
				return $this->error('添加成功！');
			}
		}


		$ai = db('ai')->where('id',input('id'))->select();
		$this->assign('ai',$ai);
		return view();
	}

	function aiDel()
	{
		$result = db('ai')->where('id',input('id'))->delete();
		if($result){
			return $this->success('删除成功！');
		}else{
			return $this->error('删除失败！');
		}
		}


}























