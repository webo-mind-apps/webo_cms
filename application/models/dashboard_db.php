<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Dashboard_db extends CI_Model 
{  
    function __construct()  
    {
        parent::__construct();
	} 
	public function fetch_total_clients()
    { 
        $query = $this->db->get('client_master');
        if ($query->num_rows() > 0) { 
            return $query->num_rows();
        } else {
            return false;
        }
	}
	
	public function fetch_total_active_websites()
    { 
		$this->db->where('status',0);
        $query = $this->db->get('company_website');
		$active = $query->num_rows();  
		$this->db->where('status',1);
        $query = $this->db->get('company_website');
		$inactive = $query->num_rows();
		$data = array($active,$inactive);
		return $data;
	
	}
	public function fetch_total_ssl_remainders()
    {   
		
		$now = date("Y");
        $query = $this->db->get('add_ssl_remainder');
		$ssl_rem_count = $query->num_rows();  
		 
		$ssl_array = $query->result_array(); 
		$net_amt = 0;
		foreach($ssl_array as $row){ 
			if($now == date("Y", strtotime($row['renewel_date']))){
				$net_amt = $net_amt+$row['net_amt']; 
			}
		}
		$data = array($ssl_rem_count, ceil($net_amt),$now);
		return $data;
	
	}
	function arr_op($arr)
    {
        echo "<pre>";
        print_r($arr);
        exit;
    }
}
   
 

