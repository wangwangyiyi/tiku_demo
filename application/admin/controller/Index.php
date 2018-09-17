<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

/**
* 
*/
class Index extends Common
{
	
	function index()
	{

		return view();
	}

	public function logo()
	{
		$img = db('logo_img')->select();
		$this->assign('img',$img);
		return view();
	}
	public function logoEdit()
	{
		if(request()->isPost())
		{
			$file = $_FILES["logo"]["tmp_name"];
			// $name = rand().$_FILES["logo"]['name'];
			$name = rand().substr($_FILES["logo"]["name"],strrpos($_FILES["logo"]['name'],'.'));
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			$data['id'] = input('id');
			$logo = db('logo_img')
				->where('id',$data['id'])
				->update([
					'img'  => $name,
					'time' => time(),
				]);
			if(!$logo){
				return $this->error('失败！');
			}else{
				return $this->success('成功！','logo');
			}
		}
		$img = db('logo_img')->select();
		$this->assign('img',$img);
		return view();
	}
	public function desc()
	{	
		$edit = db('catename_desc')->select();
		$this->assign('edit',$edit);
		return view();
	}
	public function descDel()
	{
		$result = db('catename_desc')->where('id',input('id'))->delete();
		if($result){
			return $this->success('删除成功！');
		}else{
			return $this->error('删除失败！');
		}
	}
	public function descEdit()
	{	if(request()->isPost())
		{
			$data['title'] = input('title');
			$data['desc'] = input('desc');
			$id = input('id');

			$edit = db('catename_desc')
					->where('id',$id)
					->update([
					'title'  => input('title'),
					'desc' => input('desc'),
					'time' =>time(),
					]);
			if($edit){
				return $this->success('成功！','Index/desc');
			}else{
				return $this->error('失败！');
			}
		}
		$edit = db('catename_desc')->select();
		$this->assign('edit',$edit);
		return view();
	}
	
	public function banner()
	{
		$banner_img = db('banner_img')->select();
		$this->assign('banner_img',$banner_img);
		return view();
	}
	public function banner_add()
	{
		if(request()->isPost())
		{
			$data['file'] = $_FILES['file']['name'];
			$name = rand().substr($data['file'], strrpos($data['file'], '.'));
			$upLoadFiles = move_uploaded_file($_FILES['file']['tmp_name'],
						   dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			if(!$upLoadFiles){
				return $this->error('上传失败！');
			}
			$result = db('banner_img')->insert([
				'img'=> $name,
				'title'=>input('title'),
				]);
			if($result){
				return $this->success('成功！','Index/banner'); 
			}else{
				return $this->error('添加成功！');
			}
		}
		return view();
	}
	public function bannerEdit()
	{	
		if(request()->isPost())
		{
			$data['file'] = $_FILES['file']['name'];
			$name = rand().substr($data['file'], strrpos($data['file'], '.'));
			$upLoadFiles = move_uploaded_file($_FILES['file']['tmp_name'],
						   dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			if(!$upLoadFiles){
				return $this->error('上传失败！');
			}
			$result = db('banner_img')->where('id',input('id'))->update([
				'img'=> $name,
				'title'=>input('title'),
				]);
			if($result){
				return $this->success('成功！','Index/banner'); 
			}else{
				return $this->error('添加成功！');
			}
		}

		$edit = db('banner_img')->where('id',input('id'))->select();
		$this->assign('edit',$edit);
		return view();
	}
	public function bannerDel()
	{
		$result = db('banner_img')->where('id',input('id'))->delete();
		if($result){
			return $this->success('删除成功！');
		}else{
			return $this->error('删除失败！');
		}
	}
}













