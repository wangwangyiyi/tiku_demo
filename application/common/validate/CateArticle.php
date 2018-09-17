<?php
namespace app\common\validate;
use think\Validate;

/**
* 
*/
class CateArticle extends Validate
{
	protected $rule = [
			'name' => 'require',
			'desc' => 'require',
			'shop' => 'require',
			'scrope' => 'require',
			'people' => 'require',
			'resource' => 'require',
			'cate_id' => 'require',
			'pic' => 'require',
			'content' => 'require',
	];
	protected $message = [
			'name.require'   =>'名字不能为空',
			'desc.require'   =>'描述不能为空',
			'shop.require'   =>'请填写时否免费',
			'scrope.require'   =>'评分不能为空',
			'people.require'   =>'观看人数不能为空',
			'resource.require'   =>'视频地址不能为空',
			'cate_id.require'   =>'所属栏目不能为空',
			'pic.require'   =>'本栏目LOGO不能为空',
			'content.require'   =>'栏目详细介绍不能为空',
	];
	 protected $scene = [
        'login'  =>  ['username','password'],
    ];
}