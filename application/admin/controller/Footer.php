<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Common;

use app\admin\model\Cate as cateModel;
use app\index\model\HomeUser as homeUserModel;
use app\common\validate\Footer as FooterValidate;


/**
* 
*/
class Footer extends Common
{
	
	function footer()
	{
		$homeUserModel = new homeUserModel();
		$result = $homeUserModel->select();
		$this->assign('result',$result);
		return view();
	}
	function about()
	{
		$result = db('about')->select();
		$this->assign('result',$result);
		return view();
	}
	function about_add()
	{
		if(request()->isPost()){
			$file = $_FILES["file"]["tmp_name"];
			// $name = rand().$_FILES["logo"]['name'];
			$name = rand().substr($_FILES["file"]["name"],strrpos($_FILES["file"]['name'],'.'));

			$data['img'] = $name;
			$data['name'] = input('name');
			$data['content'] = input('content');
			$data['time'] = time();
			$FooterValidate = new FooterValidate();
			if(!$FooterValidate->scene('about_add')->check($data)){
				return $this->error($FooterValidate->getError());
			}
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			
		
			$result = db('about')->insert($data);
			if($result){
				return $this->success('成功！','Ai/ai');
			}else{
				return $this->error('失败！');
			}
		}

		
		return view();
	}
	function about_edit()
	{
		if(request()->isPost()){
			$id = input('id');
			$file = $_FILES["file"]["tmp_name"];
			// $name = rand().$_FILES["logo"]['name'];
			$name = rand().substr($_FILES["file"]["name"],strrpos($_FILES["file"]['name'],'.'));

			$data['img'] = $name;
			$data['name'] = input('name');
			$data['content'] = input('content');
			$data['time'] = time();
			$FooterValidate = new FooterValidate();
			if(!$FooterValidate->scene('about_edit')->check($data)){
				return $this->error($FooterValidate->getError());
			}
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			
		
			$result = db('about')->where('id',$id)->update([
				'img' => $name,
				'name' => input('name'),
				'content' => input('content'),
				'time' => time(),
			]);
			if($result){
				return $this->success('成功！','Footer/about');
			}else{
				return $this->error('失败！');
			}
		}

		$id = input('id');
		$result = db('about')->where('id',$id)->select();
		$this->assign('result',$result);
		return view();
	}
	function about_del()
	{
		$result = db('about')->where('id',input('id'))->delete();
		if($result){
			return $this->success('成功！','Footer/about');
			}else{
				return $this->error('失败！');
			}
		return view();
	}

	function help()
	{
		$homeUserModel = new homeUserModel();
		$result = $homeUserModel->select();
		$this->assign('result',$result);
		return view();
	}
	function help_add()
	{
		$homeUserModel = new homeUserModel();
		$result = $homeUserModel->select();
		$this->assign('result',$result);
		return view();
	}
	function help_edit()
	{
		$homeUserModel = new homeUserModel();
		$result = $homeUserModel->select();
		$this->assign('result',$result);
		return view();
	}
	function call()
	{
		
		$result = db('call')->select();
		$this->assign('result',$result);
		return view();
	}
	function call_add()
	{
		if(request()->isPost()){
			$file = $_FILES["img"]["tmp_name"];
			// $name = rand().$_FILES["logo"]['name'];
			$name = rand().substr($_FILES["img"]["name"],strrpos($_FILES["img"]['name'],'.'));
			$data['img'] = $name;
			$data['name'] = input('name');
			$data['address'] = input('address');
			$data['email'] = input('email');
			$data['server'] = input('server');
			$data['youbian'] = input('youbian');
			$data['phone'] = input('phone');
			$data['time'] = time();
			$FooterValidate = new FooterValidate();
			if(!$FooterValidate->scene('call_add')->check($data)){
				return $this->error($FooterValidate->getError());
			}
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			
		
			$result = db('call')->insert($data);
			if($result){
				return $this->success('成功！','Footer/call');
			}else{
				return $this->error('失败！');
			}
		}
		$result = db('call')->select();
		$this->assign('result',$result);
		return view();
	}
	function call_edit()
	{
		if(request()->isPost()){
			$id = input('id');
			$file = $_FILES["img"]["tmp_name"];
			// $name = rand().$_FILES["logo"]['name'];
			$name = rand().substr($_FILES["img"]["name"],strrpos($_FILES["img"]['name'],'.'));

			$data['img'] = $name;
			$data['name'] = input('name');
			$data['address'] = input('address');
			$data['email'] = input('email');
			$data['server'] = input('server');
			$data['youbian'] = input('youbian');
			$data['phone'] = input('phone');
			$data['time'] = time();
			$FooterValidate = new FooterValidate();
			if(!$FooterValidate->scene('call_edit')->check($data)){
				return $this->error($FooterValidate->getError());
			}
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			
		
			$result = db('call')->where('id',$id)->update([
				'img' => $name,
				'name' => input('name'),
				'address' => input('address'),
				'email' => input('email'),
				'server' => input('server'),
				'youbian' => input('youbian'),
				'phone' => input('phone'),
				'time' => time(),
			]);
			if($result){
				return $this->success('成功！','Footer/about');
			}else{
				return $this->error('失败！');
			}
		}

		$id = input('id');
		$result = db('call')->where('id',$id)->select();
		$this->assign('result',$result);
		return view();
		return view();
	}
	function join()
	{
		$result = db('join')->select();
		$this->assign('result',$result);		
		return view();
	}
	function join_add()
	{
		if(request()->isPost()){
			$file = $_FILES["img"]["tmp_name"];
			// $name = rand().$_FILES["logo"]['name'];
			$name = rand().substr($_FILES["img"]["name"],strrpos($_FILES["img"]['name'],'.'));
			$data['img'] = $name;
			$data['name'] = input('name');
			$data['desc'] = input('desc');

			$data['email'] = input('email');
			$data['time'] = time();
			$FooterValidate = new FooterValidate();
			if(!$FooterValidate->scene('join_add')->check($data)){
				return $this->error($FooterValidate->getError());
			}
			$bool = move_uploaded_file($file, dirname(dirname(dirname(__dir__))).'/public/upLoadFiles/'.$name);
			// var_dump('__public__'.'/upLoadFiles/'.$name);
			if(!$bool){
				return $this->error('上传失败！');
			}
			
		
			$result = db('join')->insert($data);
			if($result){
				return $this->success('成功！','Footer/join');
			}else{
				return $this->error('失败！');
			}
		}
		return view();
	}
	function join_edit()
	{
		$homeUserModel = new homeUserModel();
		$result = $homeUserModel->select();
		$this->assign('result',$result);
		return view();
	}





}