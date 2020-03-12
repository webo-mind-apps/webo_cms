<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Ssl_view_db extends CI_Model 
{  
    function __construct()  
    {
        parent::__construct();
    }

    public function make_query()
	{ 
		$month = $this->input->get('month');
		$year = date("Y");
		$date_from=$year."-".$month."-01";
		$date_to=$year."-".$month."-31";
        $order_column = array("a.id","b.company_name","a.company_website","a.manual_update_date" ,"a.renewel_date","a.net_amt",);  
		$this->db->select('a.*,b.company_name');
		$this->db->from('add_ssl_remainder a');
		$this->db->join('client_master b','b.id=a.company_id','left');
		// $this->db->join('company_website c','c.website=a.company_website','left');
		if(!empty($month)){
			$this->db->where("a.renewel_date>=",$date_from );  
			$this->db->where("a.renewel_date<=",$date_to );  
		}
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("a.id", $_POST["search"]["value"]);  
                $this->db->or_like("b.company_name", $_POST["search"]["value"]);   
                $this->db->or_like("a.company_website", $_POST["search"]["value"]);
				$this->db->or_like("a.type", $_POST["search"]["value"]);
				$this->db->or_like("a.manual_update_date", $_POST["search"]["value"]);
				$this->db->or_like("a.renewel_date", $_POST["search"]["value"]); 
				$this->db->or_like("a.net_amt", $_POST["search"]["value"]); 
				// $this->db->or_like("c.status", $_POST["search"]["value"]); 
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
           $this->db->from('add_ssl_remainder');  
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

	public function client_paid_date_details()
	{
        $id = $this->input->post('id');
		$paid_date=date("Y-m-d",strtotime($this->input->post('paid_date'))); 
		$paid_amount=$this->input->post('paid_amount'); 
		$this->db->select('company_id,company_website,type,renewel_date,net_amt');
        $this->db->where('id', $id);
		$query=$this->db->get('add_ssl_remainder');
		$row1=$query->row_array();
		$row2=array("paid_date"=>$paid_date,"paid_amount"=>$paid_amount);
		$row=array_merge($row1, $row2);
		$this->db->insert('paid_ssl_remainder',$row);
		if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
		}


       
    }
   
}

