<?php
namespace app\common\validate;
use think\Validate;

/**
* 
*/
class Footer extends Validate
{
	protected $rule = [
		'name'  =>'require',
		'content'  =>'require',
		'img'  =>'require',
		'address'  =>'require',
		'email'  =>'require',
		'server'  =>'require',
		'youbian'  =>'require',
		'phone'  =>'require',
		'desc'  =>'require',


	];
	protected $message = [
		'name.require'  => '网站标题不能为空',
		'img.require'  => '请输入网站图片',
		'content.require'  => '请输入网站详细描述',

		'address.require'  => '请输入网站地址',
		'email.require'  => '请输入联系EMAIL',
		'server.require'  => '请输入网站服务号',
		'youbian.require'  => '请输入邮编',
		'phone.require'  => '请输入网站联系方式',
		'desc.require'  => '请输入招聘信息',



	];
	 protected $scene = [
        'about_add'  =>  ['name','content'],
        'about_edit'  =>  ['name','content'],
        'call_add'  =>  ['name','img','address','email','server','youbian','phone'],
        'call_edit'  => ['name','img','address','email','server','youbian','phone'],
        'join_add'  =>  ['name','desc','email'],
        'join_edit'  =>  ['name','desc','email'],


    ];
}