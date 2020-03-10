<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Client_master_db extends CI_Model 
{  
    function __construct()  
    {
        parent::__construct();
    }

    public function make_query()
	{ 
        $order_column = array("id","company_name","client_name","phone", "email");  
		$this->db->select('*');
		$this->db->from('client_master ');
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->or_like("company_name", $_POST["search"]["value"]);   
                $this->db->or_like("client_name", $_POST["search"]["value"]);
				$this->db->or_like("phone", $_POST["search"]["value"]);
				$this->db->or_like("email", $_POST["search"]["value"]); 
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
           $this->db->from('client_master');  
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
    //save the index form value to the database
    public function save_client_master()
	{
		$company_name=$this->input->post('company_name'); 
		$client_name=$this->input->post('client_name'); 
		$phone=$this->input->post('phone'); 
        $email=$this->input->post('email'); 
        $data = array(
            "company_name"	=> $company_name,
            "client_name"	=> $client_name,
            "phone"			=> $phone,
            "email"			=> $email,
        );
        $this->db->where('company_name', $company_name);
		$query = $this->db->get("client_master");
		if ($query->num_rows() <= 0)
		{
            $this->db->insert('client_master',$data);
            if ($this->db->affected_rows() > 0)
            {
                return true;
            }
        }
        else
        {
            return true;
        }
    }
    public function edit_client_master()
	{
        $id = $this->input->post('id');
		$company_name=$this->input->post('company_name'); 
		$client_name=$this->input->post('client_name'); 
		$phone=$this->input->post('phone'); 
        $email=$this->input->post('email'); 
        $data = array(
            "company_name"	=> $company_name,
            "client_name"	=> $client_name,
            "phone"			=> $phone,
            "email"			=> $email,
        );
        $this->db->where('id', $id);
        $this->db->update('client_master',$data);
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //save the index form value to the database
    function save_website($data)
    {
        $this->db->where('website', $data['website']);
        $query = $this->db->get("company_website");
        if ($query->num_rows() <= 0)
		{
            $this->db->insert('company_website',$data);
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
    function client_master_view_details($id)
	{
		$this->db->select('a.*,b.*, b.id as site_id,a.id as id');
		$this->db->from('client_master a');
		$this->db->join('company_website b','a.id=b.company_id','left');
		$this->db->where('a.id',$id);
		$query=$this->db->get();
		$q=$query->result_array();
		return $q;
    }
    function get_client_master_company_id($company_name)
	{
		$this->db->select('id');
		$this->db->where('company_name',$company_name);
		$query=$this->db->get('client_master');
		$q=$query->row_array();
		return $q;
    }
    function delete_client()
	{
		$id=$this->input->post('id'); 
		$this->db->where("id",$id);
        if($this->db->delete("client_master"))
        {
            $this->db->where("company_id",$id);
            if($this->db->delete("company_website"))
            {
                return true;
            }
		}
    }
    function website_status_change()
	{
		$id=$this->input->post('id'); 
        $change_val=$this->input->post('change_val'); 
        
        $data=array('status'=>$change_val);
		$this->db->where("id",$id);
        if($this->db->update("company_website",$data))
        {
            return true;
		}
	}
}

