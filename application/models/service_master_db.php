<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Service_master_db extends CI_Model 
{  
    function __construct()  
    {
        parent::__construct();
    }
    //data tables................................................................................................................
    public function make_query()
	{ 
        $order_column = array("id","service_name","hsn_code");  
		$this->db->select('*');
		$this->db->from('service_master ');
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->or_like("service_name", $_POST["search"]["value"]);   
                $this->db->or_like("hsn_code", $_POST["search"]["value"]);
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
           $this->db->from('service_master');  
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
    ///data tables................................................................................................................
    
    function save_service_master()
    {  
		$service_name=$this->input->post('service_name'); 
        $hsn_code=$this->input->post('hsn_code'); 
        $service_id=$this->input->post('service_id'); 
        $data=array(
            'service_name'      => $service_name,
            'hsn_code'          => $hsn_code,
        );
        if(empty($service_id))
        {
            $this->db->where('service_name', $service_name);
            $query = $this->db->get("service_master");
            if ($query->num_rows() <= 0)
            {
                $this->db->insert('service_master',$data);
                if ($this->db->affected_rows() > 0)
                {
                return "insert";
                }
            }
            else
            {
            return "exist";
            } 
        }
        else{
            $this->db->where('id', $service_id);
            $this->db->update('service_master',$data);
                if ($this->db->affected_rows() > 0)
                {
                return "update";
                }
        }
    }
    function service_master_edit_details($id)
    {  
		// $id=$this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->get("service_master");
        $q=$query->row_array();
        return $q;
    }
    function service_master_delete()
    {  
		$id=$this->input->post('id');
        $this->db->where('id', $id);
        if($this->db->delete('service_master'))
        {
            return true;
        }
	}
    
}

