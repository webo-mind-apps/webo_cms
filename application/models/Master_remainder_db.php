<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master_remainder_db extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function notify_master_remainder_db()
    {
        $this->db->select('*');
        $this->db->from('remainder_master');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notify_client_remainder_db()
    {
        $this->db->select('*');
        $this->db->from('client_master');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function make_query()
    {
        $order_column = array("id,remainder_name,phone,email");
        $this->db->select('*');
        $this->db->from('remainder_master');
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("id", $_POST["search"]["value"]);
            $this->db->or_like("remainder_name", $_POST["search"]["value"]);
            $this->db->or_like("phone", $_POST["search"]["value"]);
            $this->db->or_like("email", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'DESC');
        }
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from('remainder_master');
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

    public function save_master_remainder()
    {
        $remainder_name = $this->input->post('remainder_name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $id = $this->input->post('change_id');
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('remainder_master');
        if ($query->num_rows() <= 0) {
            $data = array(
                'remainder_name' => $remainder_name,
                'phone' => $phone,
                'email' => $email,
            );
            if (empty($id) || $id == '') {
                $this->db->insert('remainder_master', $data);
                if ($this->db->affected_rows() > 0) {
                    return "insert";
                }
            } else if (!empty($id) || $id != '') {
                $this->db->where('id', $id);
                $this->db->update('remainder_master', $data);
                if ($this->db->affected_rows() > 0) {
                    return "update";
                }
            }
        } else {
            return "exist";
        }
    }
    public function edit_remainder_master()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->get('remainder_master');
        $q = $query->row_array();
        return $q;
    }
    function delete_remainder_master()
    {
        $id = $this->input->post('id');
        $this->db->where("id", $id);
        if ($this->db->delete("remainder_master")) {
            return true;
        }
    }
}
