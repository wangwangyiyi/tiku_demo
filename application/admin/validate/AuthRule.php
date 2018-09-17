<?php
namespace app\admin\validate;
use think\Validate;
/**
* 
*/
class AuthRule extends Validate
{
	
	protected $rule = 
	[
		'name'=>'require',
		'type'=>'require',

	];
	protected $message = 
	[
		'name.require'=>'名称必须填写',
		'type.require'=>'控制器和方法必须填写',


	];
}