<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');

	}

	public function currnet_datetime()
	{
		return date("Y-m-d H:i:s");
	}

	public function common_header($header = array())
	{
		$this->load->view('templates/header',$header);
	}

	public function common_footer($footer = array())
	{
		$this->load->view('templates/footer',$footer);
	}

	public function common_sidebar($sidebar = array())
	{
		$this->load->view('templates/sidebar',$sidebar);
	}

	public function record_list($table = "",$column = "",$where = "",$join = "",$record_type = "",$order_by = "")
	{
		$this->db->select($column);
		$this->db->from($table);

		if(!empty($join))
		{
			foreach($join as $k => $v)
			{
				if (strpos($k, ',') !== false)
				{
					$table_arr = explode(",",$k);

					if(!empty($table_arr))
					{
						if($table_arr[1] == "left")
						{
							$this->db->join($table_arr[0],$v,$table_arr[1]); //(table_name, on condition, left/right join)
						}
						else if($table_arr[1] == "right")
						{
							$this->db->join($table_arr[0],$v,$table_arr[1]);
						}
						else
						{
							$this->db->join($table_arr[0],$v);
						}
					}
				}
				else
				{
					$this->db->join($k,$v);
				}
			}
		}

		if(!empty($where))
		{
			foreach($where as $k => $v)
			{
				$this->db->where($k,$v);
			}
		}

		$sql_query = $this->db->get();

		if($record_type == "row")
		{
			return $sql_query->row_array();
		}
		else
		{
			return $sql_query->result_array();
		}

	}

	public function add_record($table = "",$insert_record)
	{
		return $this->db->insert($table,$insert_record);
	}


	public function add_record_with_last_insertid($table = "",$insert_record)
	{
		$this->db->insert($table,$insert_record);
		return $this->db->insert_id();
	}

	public function update_record($table = "",$update_record,$where)
	{
		$this->db->where($where);
		return $this->db->update($table,$update_record);
	}

}