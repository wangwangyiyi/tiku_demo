<?php
namespace app\index\model;
use think\Model;

/**
* 
*/
class HomeUser extends Model
{
	protected $table = 'home_user';
	
	function registerModel($data)
	{
		$query = $this->where('username',$data['username'])->find();
		if($query){
			return $result = 0;
		}
		if($data['password'] !== $data['re_password']){
			return $result = 1;
		}
		$this->username = $data['username'];
		$this->password = $data['password'];
		$this->time = time();
		$result = $this->save();
		if($result){
			return $result = 2;
		}

	}
}