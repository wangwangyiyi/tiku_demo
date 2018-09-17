<?php
namespace app\admin\validate;
use think\Validate;
/**
* 
*/
class AdminUser extends Validate
{
	
	protected $rule = 
	[
		'admin_user'=>'require',
		'password'=>'require',
		're_password'=>'require',

	];
	protected $message = 
	[
		'admin_user.require'=>'名称必须填写',
		'password.require'=>'密码必须填写',
		're_password.require'=>'确认密码必须填写',


	];
}