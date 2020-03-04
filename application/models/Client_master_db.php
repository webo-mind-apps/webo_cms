<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Client_master_db extends CI_Model 
{  
    function __construct()  
    {
        parent::__construct();
    }
    public function save_client_master()
	{
		$company_name=$this->input->post('company_name'); 
		$client_name=$this->input->post('client_name'); 
		$phone=$this->input->post('phone'); 
        $email=$this->input->post('email'); 
        $website=$this->input->post('website_name'); 
        print_r($website);
        exit;
        $data = array(
            "entity_name"			=> $company_name,
            "client_id"				=> $client_name,
            "ffi_emp_id"			=> $phone,
            "console_id"			=> $email,
        );
        $this->db->where('company_name', $company_name);
		$query = $this->db->get("client_master");
		if ($query->num_rows() <= 0)
		{
		$this->db->insert('client_master',$data);
        if ($this->db->affected_rows() > 0)
		{
			$this->save_website($website);
		}
		else
		{
			return false;
		}
        }
        else
        {
            $this->save_website($website);
        }
    }

    function save_website($data)
    {
        foreach($data as $row)
        {
        $this->db->where('company_name', $company_name);
        $this->db->where('website', $company_name);
        $query = $this->db->get("client_master");
        }
       
    }
}
