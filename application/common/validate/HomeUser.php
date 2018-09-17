<?php
namespace app\common\validate;
use think\Validate;

/**
* 
*/
class HomeUser extends Validate
{
	protected $rule = [
		'username'  =>'require',
		'password'  =>'require',
		're_password'  =>'require',
	];
	protected $message = [
		'username.require'  => '姓名不能为空',
		'password.require'  => '密码不能为空',
		're_password.require'  => '请确认密码',

	];
	 protected $scene = [
        'login'  =>  ['username','password'],
    ];
}