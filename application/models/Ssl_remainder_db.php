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

    function insert_ssl_remainder_db()
    {
        $company_name_selected = $this->input->post('company_name_selected');
        $this->db->select('id');
        $this->db->where('company_name', $company_name_selected);
        $query = $this->db->get('client_master');
        $company_id = $query->result_array();
        $company_id = $company_id[0]['id'];
        // echo "<pre>";
        // echo $company_id;
        // exit; 
        $company_website_selected = $this->input->post('company_website_selected');
        $renewel_method_selected = $this->input->post('renewel_method_selected');
        $manual_update_date = "";
        $renewel_date = "";
        if (!empty($_POST['manual_update_date'])) {
            $manual_update_date = $this->input->post('manual_update_date');
            $renewel_date = $this->input->post('manual_renewel_date');
            // echo "<pre>";
            // echo $renewel_date;
            // echo $manual_update_date;
            // exit;
        } else if (!empty($_POST['auto_renewel_date'])) {
            $renewel_date = $this->input->post('auto_renewel_date');
        }
        $amount_selected = $this->input->post('amount_selected');

        $field = array('company_id' => $company_id, 'company_website' => $company_website_selected, 'type' => $renewel_method_selected, 'manual_update_date' => $manual_update_date, 'renewel_date' => $renewel_date, 'amount_paid' => $amount_selected);
        if ($this->db->insert("add_ssl_remainder", $field)) {
            return true;
        } else {
            return false;
        }
    }

    function del_new_user()
    {
        $id  = $this->input->post('del_id');
        $this->db->where('id', $id);
        $this->db->delete("user_master");
    }
    function update_new_user_record()
    {
        $name = $this->input->post('doctor_username');
        $password = $this->input->post('doctor_password');
        $password = hash('sha512', $password);
        $id = $this->input->post('update_new_created_user_id');
        $field = array('user_name' => $name, '	user_password' => $password);
        $this->db->where('id', $id);
        if ($this->db->update('user_master', $field)) {
            return true;
        }
    }
}
