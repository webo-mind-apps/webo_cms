<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ssl_remainder_db extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //Check records to auto fill values
    function check_record_db($get_cmp_id, $get_cmp_website)
    {
        $this->db->select('a.*,c.company_name,c.id');
        $this->db->from('add_ssl_remainder a');
        $this->db->join('client_master c', 'a.company_id=c.id', 'left');
        $this->db->where('c.id', $get_cmp_id);
        $this->db->where('a.company_website', $get_cmp_website);
        $this->db->order_by("a.id", "desc");
        $check_record = $this->db->get();
        $num = $check_record->num_rows();
        if ($num) {
            $check_record =  $check_record->row();
            // echo "<pre>";
            // print_r($check_record);
            // exit;

            return $check_record;
        } else {
            return false;
        }
    }
    //CHECK RECORDS TO AUTO FILL VALUES

    //DATA TABLES CODE

    public function make_query()
    {
        $order_column = array("a.id", "c.company_name", "a.company_website", "a.type", "a.renewel_date", "a.amount_paid", "a.paid_date",);
        $this->db->select('a.*,c.company_name');
        $this->db->from('paid_ssl_remainder a');
        $this->db->join('client_master c', 'a.company_id=c.id', 'left');
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("a.id", $_POST["search"]["value"]);
            $this->db->or_like("c.company_name", $_POST["search"]["value"]);
            $this->db->or_like("a.company_website", $_POST["search"]["value"]);
            $this->db->or_like("a.type", $_POST["search"]["value"]);
            $this->db->or_like("a.renewel_date", $_POST["search"]["value"]);
            $this->db->or_like("a.amount_paid", $_POST["search"]["value"]);
            $this->db->or_like("a.paid_date", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('a.id', 'DESC');
        }
    }

    function get_all_data()
    {
        $this->db->select('a.*,c.company_name');
        $this->db->from('paid_ssl_remainder a');
        $this->db->join('client_master c', 'a.company_id=c.id', 'left');
        return $this->db->count_all_results();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    //Data tables code
    public function fetch_company_names()
    {
        $this->db->select('id,company_name');
        $this->db->from('client_master');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function fetch_company_relavent_websites($company_id)
    {
        $this->db->select('website');
        $this->db->from('company_website');
        $this->db->where('company_id', $company_id); //need to stroe in id format
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function insert_ssl_remainder_db()
    {
        $company_id = "";
        $company_website_selected = "";
        $renewel_method_selected = "";
        $company_id = $this->input->post('company_id_selected');
        $company_website_selected = $this->input->post('company_website_selected');
        $renewel_method_selected = $this->input->post('renewel_method_selected');
        $manual_update_date = "";
        $renewel_date = "";
        //CHECKING UPDATE AND RENEWAL DATES DIFFERECE---------------------------------------------------/
        if (!empty($_POST['manual_update_date'])) {

            $manual_update_date = $this->input->post('manual_update_date');
            $renewel_date = $this->input->post('manual_renewel_date');
            $this->db->select('*');
            $this->db->from('add_ssl_remainder');

            $this->db->where('company_id', $company_id);
            $this->db->where('company_website', $company_website_selected);
            // $this->db->where('manual_update_date', $manual_update_date);
            // $this->db->where('renewel_date', $renewel_date);
            $amount_selected = $this->input->post('amount_selected');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $field = array('company_id' => $company_id, 'company_website' => $company_website_selected, 'type' => $renewel_method_selected, 'manual_update_date' => $manual_update_date, 'renewel_date' => $renewel_date, 'amount_paid' => $amount_selected);
                $this->db->where('company_id', $company_id);
                $this->db->where('company_website', $company_website_selected);
                $this->db->update("add_ssl_remainder", $field);

                $this->session->set_flashdata('ssl_remainder_updated', 'ssl_remainder_updated');
                return false;
            } else {
                $field = array('company_id' => $company_id, 'company_website' => $company_website_selected, 'type' => $renewel_method_selected, 'manual_update_date' => $manual_update_date, 'renewel_date' => $renewel_date, 'amount_paid' => $amount_selected);
                if ($this->db->insert("add_ssl_remainder", $field)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else if (!empty($_POST['auto_renewel_date'])) {

            $renewel_date = $this->input->post('auto_renewel_date');
            $this->db->select('*');
            $this->db->from('add_ssl_remainder');
            // $this->db->where('renewel_date', $renewel_date);
            $this->db->where('company_id', $company_id);
            $this->db->where('company_website', $company_website_selected);
            $query = $this->db->get();
            $amount_selected = $this->input->post('amount_selected');
            if ($query->num_rows() > 0) {
                $field = array('company_id' => $company_id, 'company_website' => $company_website_selected, 'type' => $renewel_method_selected, 'manual_update_date' => $manual_update_date, 'renewel_date' => $renewel_date, 'amount_paid' => $amount_selected);
                $this->db->where('company_id', $company_id);
                $this->db->where('company_website', $company_website_selected);
                $this->db->update("add_ssl_remainder", $field);
                $this->session->set_flashdata('ssl_remainder_updated', 'ssl_remainder_updated');
                return false;
            } else {
                $field = array('company_id' => $company_id, 'company_website' => $company_website_selected, 'type' => $renewel_method_selected, 'manual_update_date' => $manual_update_date, 'renewel_date' => $renewel_date, 'amount_paid' => $amount_selected);
                if ($this->db->insert("add_ssl_remainder", $field)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        //CHECKING UPDATE AND RENEWAL DATES DIFFERECE---------------------------------------------------/


    }

    function delete_remainder_db()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        if ($this->db->delete('paid_ssl_remainder')) {
            return true;
        }
    }
    // function update_new_user_record()
    // {
    //     $name = $this->input->post('doctor_username');
    //     $password = $this->input->post('doctor_password');
    //     $password = hash('sha512', $password);
    //     $id = $this->input->post('update_new_created_user_id');
    //     $field = array('user_name' => $name, '	user_password' => $password);
    //     $this->db->where('id', $id);
    //     if ($this->db->update('user_master', $field)) {
    //         return true;
    //     }
    // }
}
