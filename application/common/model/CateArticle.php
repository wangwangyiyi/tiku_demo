<?php
namespace app\common\model;
use think\Model;
/**
* 
*/
class CateArticle extends Model
{
	protected $table = 'cate_article';
	function add($data)
	{
		$resul = $this->save($data);
		if($resul){
			return 1;
		}else{
			return 2;
		}

	}










}