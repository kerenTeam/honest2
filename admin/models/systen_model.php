<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Systen_model extends CI_Model
{
	// 系统设置表
	const TBL_SYSTEM = 'system';
	// banner 列表
	public function Banners()
	{
		$where['name'] = 'banner';
		$query = $this->db->where($where)->get(self::TBL_SYSTEM);
		return $query->row_array();
	}

	// banner修改、
	public function EditBanner($data)
	{
		$where['name'] = 'banner';
		return $this->db->where($where)->update(self::TBL_SYSTEM,$data);
	}


}

?>
	