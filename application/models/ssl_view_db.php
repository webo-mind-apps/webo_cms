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
        $order_column = array("a.id","b.company_name","a.company_website","a.type", "a.renewel_date","a.amount_paid");  
		$this->db->select('a.*,b.company_name');
		$this->db->from('add_ssl_remainder a');
		$this->db->join('client_master b','b.id=a.company_id','left');
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("a.id", $_POST["search"]["value"]);  
                $this->db->or_like("b.company_name", $_POST["search"]["value"]);   
                $this->db->or_like("a.company_website", $_POST["search"]["value"]);
				$this->db->or_like("a.type", $_POST["search"]["value"]);
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
             $this->db->order_by('id', 'DESC');  
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
		$paid_date=$this->input->post('paid_date'); 
		$this->db->select('company_id,company_website,type,renewel_date,amount_paid');
        $this->db->where('id', $id);
		$query=$this->db->get('add_ssl_remainder');
		$row1=$query->row_array();
		$row2=array("paid_date"=>$paid_date);
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

