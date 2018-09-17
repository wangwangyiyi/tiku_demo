<?php
namespace app\common\model;
use think\Model;
/**
* 
*/
class Live extends Model
{
	protected $table = 'live';
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