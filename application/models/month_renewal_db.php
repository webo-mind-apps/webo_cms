<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Month_renewal_db extends CI_Model 
{  
    function __construct()  
    {
        parent::__construct();
    }

    public function make_query()
	{ 
		$month = date("m");
		$year = date("Y");
		$date_from=$year."-".$month."-01";
        $date_to=$year."-".$month."-31";
       
        $order_column = array("a.id","b.company_name","a.company_website","a.type","a.manual_update_date" ,"a.renewel_date","a.amount_paid");  
		$this->db->select('a.*,b.company_name');
		$this->db->from('add_ssl_reminder a');
		$this->db->join('client_master b','b.id=a.company_id','left');
		$this->db->where("a.renewel_date>=",$date_from );  
		$this->db->where("a.renewel_date<=",$date_to ); 
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("a.id", $_POST["search"]["value"]);  
                $this->db->or_like("b.company_name", $_POST["search"]["value"]);   
                $this->db->or_like("a.company_website", $_POST["search"]["value"]);
				$this->db->or_like("a.type", $_POST["search"]["value"]);
				$this->db->or_like("a.manual_update_date", $_POST["search"]["value"]);
				$this->db->or_like("a.renewel_date", $_POST["search"]["value"]); 
				$this->db->or_like("a.amount_paid", $_POST["search"]["value"]); 
            $this->db->group_end();
		}
		if(isset($_POST["order"]))  
        {  
             $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
             $this->db->order_by('a.renewel_date', 'ASC');  
        }  	
	}

	function get_all_data()  
    {  
           $this->db->select("*");
           $this->db->from('add_ssl_reminder');  
           return $this->db->count_all_results();  
	}
	
	function get_filtered_data(){  
		$this->make_query();  
		$query = $this->db->get();  
		return $query->num_rows();  
	} 

	function make_datatables(){  
        $this->make_query();   
		if($_POST["length"] != -1)  
		{  
			 $this->db->limit($_POST['length'], $_POST['start']);  
		}  
		$query = $this->db->get();  
		return $query->result();  
	}

	
}

