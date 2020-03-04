<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Client_master_db extends CI_Model 
{  
    function __construct()  
    {
        parent::__construct();
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
    //save the index form value to the database
    function save_website($data)
    {
        $this->db->where('company_name', $data['company_name']);
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
}

