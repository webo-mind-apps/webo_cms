<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master_reminder_db extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetch_gst()
    {
        $this->db->select('gst_per');
        $this->db->from('gst');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function fetch_notify_ssl_reminder_db()
    {
        $now = date("Y-m-d"); 
        $this->db->select('a.*,b.company_name');
        $this->db->from('add_ssl_reminder a');
		$this->db->join('client_master b', 'a.company_id=b.id', 'left'); 
        if(!empty($now)){ 
            $this->db->where('renewel_date BETWEEN DATE_SUB(NOW(), INTERVAL 10 DAY) AND NOW()');
		}
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_master_reminder_db()
    {
        $this->db->select('reminder_name,phone,email');
        $this->db->from('reminder_master');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notify_client_reminder_db()
    {
        $this->db->select('*');
        $this->db->from('client_master');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function make_query()
    {
        $order_column = array("id,reminder_name,phone,email");
        $this->db->select('*');
        $this->db->from('reminder_master');
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("id", $_POST["search"]["value"]);
            $this->db->or_like("reminder_name", $_POST["search"]["value"]);
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
        $this->db->from('reminder_master');
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

    public function save_master_reminder()
    {
        $reminder_name = $this->input->post('reminder_name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $id = $this->input->post('change_id');
        $pass = $this->input->post('pass');
        $cpass = $this->input->post('cpass');
        $hashed=hash('sha512',$pass);
        if($pass!='Pass@123')
        {
            $data = array(
                'reminder_name' => $reminder_name,
                'phone' => $phone,
                'email' => $email,
                'password'=>$hashed,
            );
        }
        else if($pass=='Pass@123'){

            $data = array(
                'reminder_name' => $reminder_name,
                'phone' => $phone,
                'email' => $email,
            );
        }
       
            $hashed = hash('sha512', $pass);
            if (empty($id) || $id == '')
             {
                if($pass==$cpass)
                {
                   
                    $this->db->select('*');
                    $this->db->where('email', $email);
                    $query = $this->db->get('reminder_master');
                    
                    if ($query->num_rows() <= 0)
                     {
                            $this->db->insert('reminder_master', $data);
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
                else
                {
                    return "pass_wrong";
                }
        }
        else if (!empty($id) || $id != '') 
        {
            if($pass==$cpass)
            {
                $this->db->where('id', $id);
                $this->db->update('reminder_master', $data);
                if ($this->db->affected_rows() > 0) {
                    return "update";
                }
            }
            else
                {
                    return "pass_wrong";
                }
        }
    }
    public function edit_reminder_master()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->get('reminder_master');
        $q = $query->row_array();
        return $q;
    }
    function master_reminder_delete()
    {
        $id = $this->input->post('id');
        $this->db->where("id", $id);
        if ($this->db->delete("reminder_master")) {
            return true;
        }
    }
    function master_reminder_edit_details($id)
    {  
		// $id=$this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->get("reminder_master");
        $q=$query->row_array();
        return $q;
    }
}
