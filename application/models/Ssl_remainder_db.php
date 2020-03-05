<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ssl_remainder_db extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function fetch_company_names()
    {
        $this->db->select('company_name');
        $this->db->from('client_master');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function fetch_company_relavent_websites($company_name)
    {
        $this->db->select('website');
        $this->db->from('company_website');
        $this->db->where('company_name', $company_name);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    } 
}
