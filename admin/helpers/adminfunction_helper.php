<?php 

	// 获取用户名
	function get_username($id)
	{
			$CI = &get_instance();
			$sql = "select userName from honest_member where userId = '$id'";
			$query = $CI->db->query($sql);
			$name = $query->row_array();
			return $name['userName'];
	}



 ?>