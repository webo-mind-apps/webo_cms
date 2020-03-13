<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ssl_remainder_db extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //Check records to auto fill values
    function check_record_db()
    {
        $get_cmp_id = $this->input->post('get_cmp_id');
        $get_cmp_website = $this->input->post('get_cmp_website');
        $id = $this->input->post('id');
        $this->db->select('a.*,c.company_name,c.id,c.gst,DATE_FORMAT(manual_update_date, "%d-%m-%Y") as manual_update_date,DATE_FORMAT(renewel_date, "%d-%m-%Y") as renewel_date');
        $this->db->from('add_ssl_remainder a');
        $this->db->join('client_master c', 'a.company_id=c.id', 'left');
        if($id=="" || empty($id))
        {
        $this->db->where('a.company_id', $get_cmp_id);
        $this->db->where('a.company_website', $get_cmp_website);
        }
        else if($id!="" || !empty($id))
        {
        $this->db->where('a.id', $id);
        }
        $this->db->order_by("a.id", "desc");
        $check_record = $this->db->get();
        $num = $check_record->num_rows();
        if ($num) {
            $check_record =  $check_record->row_array();
            return $check_record;
        } else {
            return false;
        }
    }
    //CHECK RECORDS TO AUTO FILL VALUES

    // //fetch client master gst
    // function auto_fill_gst()
    // {
    //     $get_cmp_id = $this->input->post('get_cmp_id');
    //     $this->db->select('gst');
    //     $this->db->from('client_master');
    //     $this->db->where('id', $get_cmp_id);
    //     $check_record = $this->db->get();
    //     $num = $check_record->num_rows();
    //     if ($num) {
    //         $check_record =  $check_record->row_array();
    //         return $check_record;
    //     } else {
    //         return false;
    //     }
    // }
    //    //fetch client master gst

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
    public function fetch_gst()
    {
        $this->db->select('*');
        $this->db->from('gst');
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
        $this->db->where('status', 0); // website is active or inactive  0 Active
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function view_ssl_details_db($id)
    {
        $this->db->select('a.*,b.*');
        $this->db->from('paid_ssl_remainder a');
        $this->db->join('client_master b', 'a.company_id=b.id', 'left');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        $q = $query->result_array();
        return $q;
    }

    function insert_ssl_remainder_db()
    {
        $company_id = $company_website_selected = $renewel_method_selected = $gst_amt_selected = $net_amt_selected = "";

        $company_id = $this->input->post('company_id_selected');
        $company_website_selected = $this->input->post('company_website_selected');
        $renewel_method_selected = $this->input->post('renewel_method_selected');
        $status_selected = $this->input->post('ssl_status_selected');
        $amount_selected = $this->input->post('amount_selected');
        $gst_amt_selected = $this->input->post('gst_amt_selected');
        $gst_amt_selected = (float) ($gst_amt_selected);
        $net_amt_selected = $this->input->post('net_amt_selected');
        $net_amt_selected = (float) ($net_amt_selected);


        if (!empty($_POST['renewel_method_selected']) && $_POST['renewel_method_selected'] == 'manual') {

            $manual_update_date = $renewel_date = "";
            $manual_update_date = $this->input->post('manual_update_date');
            $renewel_date = $this->input->post('manual_renewel_date');
            $manual_update_date = date("Y-m-d", strtotime($manual_update_date));
            $renewel_date = date("Y-m-d", strtotime($renewel_date));
        } else if (!empty($_POST['renewel_method_selected']) && $_POST['renewel_method_selected'] == 'auto') {

            $renewel_date = "";
            $renewel_date = $this->input->post('auto_renewel_date');
            $renewel_date = date("Y-m-d", strtotime($renewel_date));
            $manual_update_date = "";
        }

        //SQL_QUERY
        $this->db->where('company_id', $company_id);
        $this->db->where('company_website', $company_website_selected);
        $query = $this->db->get('add_ssl_remainder');

        if ($query->num_rows() > 0) {
            //UPDATE CODE---------------------------------------------------/  
            $field = array('company_id' => $company_id, 'company_website' => $company_website_selected, 'type' => $renewel_method_selected, 'ssl_status' => $status_selected, 'manual_update_date' => $manual_update_date, 'renewel_date' => $renewel_date, 'amount_paid' => $amount_selected, 'gst_amt' => $gst_amt_selected, 'net_amt' => $net_amt_selected);
            $this->db->where('company_id', $company_id);
            $this->db->where('company_website', $company_website_selected);
            $this->db->update("add_ssl_remainder", $field);
            return "ssl_updated";
        }

        //INSERT CODE---------------------------------------------------/
        $field = array('company_id' => $company_id, 'company_website' => $company_website_selected, 'type' => $renewel_method_selected, 'ssl_status' => $status_selected, 'manual_update_date' => $manual_update_date, 'renewel_date' => $renewel_date, 'amount_paid' => $amount_selected, 'gst_amt' => $gst_amt_selected, 'net_amt' => $net_amt_selected);
        if ($this->db->insert("add_ssl_remainder", $field)) {
            return "ssl_inserted";
        }
    }

    function delete_remainder_db()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        if ($this->db->delete('paid_ssl_remainder')) {
            return true;
        }
    }

    //DATA TABLES CODE

    public function make_query()
    {
        $get_cmp_id = $this->input->get('cid');
        $get_cmp_website = $this->input->get('cweb');
        $order_column = array("a.id", "c.company_name", "a.company_website", "a.type", "a.renewel_date", "a.net_amt", "a.paid_date",);
        $this->db->select('a.*,c.company_name');
        $this->db->from('paid_ssl_remainder a');
        $this->db->join('client_master c', 'a.company_id=c.id', 'left');
        $this->db->where('company_id', $get_cmp_id);
        $this->db->where('company_website', $get_cmp_website);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("a.id", $_POST["search"]["value"]);
            $this->db->or_like("c.company_name", $_POST["search"]["value"]);
            $this->db->or_like("a.company_website", $_POST["search"]["value"]);
            $this->db->or_like("a.type", $_POST["search"]["value"]);
            $this->db->or_like("a.renewel_date", $_POST["search"]["value"]);
            $this->db->or_like("a.net_amt", $_POST["search"]["value"]);
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
}
