<?php
namespace app\admin\model;
use think\Model;
use app\admin\validate\Category as categoryValidate;
/**
* 
*/
class Category extends Model
{
	protected $table = 'catename';

	function add($data)
	{
		$catename = $this->where('catename',$data['catename'])->select();
		if($catename)
		{
			return 2;
		}

		$addres = $this->save($data);
		if($addres)
		{
			return 1;
		}else
		{
			return 0;
		}
 	}


 	public function gettree()
 	{
 		$result = $this->select();
 		return $this->sort($result);
 	}

 	public function sort($result,$pid=0,$level=0)
 	{
 		static $arr = array();
 		foreach ($result as $k => $v) {
 			if($v['catename_p_id'] == $pid)
 			{
 				$v['level'] = $level;
 				$arr[] = $v;
 				$this->sort($result,$v['id'],$level+1);
 			}
 		}
 		return $arr;
 	}


}
























