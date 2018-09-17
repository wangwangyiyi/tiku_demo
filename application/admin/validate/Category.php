<?php
namespace app\admin\validate;
use think\Validate;
/**
* 
*/
class Category extends Validate
{
	
	protected $rule = 
	[
		'catename'=>'require',
		'catename_p_id'=>'require',
	];
	protected $message = 
	[
		'catename.require'=>'栏目名称必须填写',
		'catename_p_id.require'=>'上级栏目名称必须填写',


	];
}