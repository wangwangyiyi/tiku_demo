<?php
namespace app\common\validate;
use think\Validate;

/**
* 
*/
class Vip extends Validate
{
	protected $rule = [

			'start_time' => 'require',
			'end_time' => 'require',
			'price' => 'require',
			'title' => 'require',
			'cate_id' => 'require',
			'pic' => 'require',

			
	];
	protected $message = [
			'start_time.require'   =>'开始时间不能为空',
			'end_time.require'   =>'结束时间不能为空',
			'price.require'   =>'请填写时金额',
			'title.require'   =>'描述不能为空',
			'cate_id.require'   =>'所属课程不能为空',
			'pic.require'   =>'本栏目LOGO不能为空',
	];
	 protected $scene = [
    ];
}