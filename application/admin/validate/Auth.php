<?php
namespace app\admin\validate;
use think\Validate;
/**
* 
*/
class Auth extends Validate
{
	
	protected $rule = 
	[
		'name'=>'require',
		'type'=>'require',

	];
	protected $message = 
	[
		'name.require'=>'名称必须填写',
		'type.require'=>'名称必须填写',


	];
}