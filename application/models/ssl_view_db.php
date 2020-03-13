<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_view_db extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	} 

	function view_ssl_details_db($id)
	{
		$this->db->select('a.*,b.*');
		$this->db->from('add_ssl_remainder a');
		$this->db->join('client_master b', 'a.company_id=b.id', 'left');

		$this->db->where('a.id', $id);
		$query = $this->db->get();
		$q = $query->result_array();
		// $q[0]['paid_date'] = $this->getPaidDate($q[0]['company_id'], $q[0]['company_website']);
		return $q;
	}

	function ssl_view_edit_details_db($id)
	{
		$this->db->select('a.*,b.company_name');
		$this->db->from('add_ssl_remainder a');
		$this->db->join('client_master b', 'a.company_id=b.id', 'left');
		$this->db->where('a.id', $id);
		$query = $this->db->get();
		$q = $query->row_array();
		return $q;
	}

	public function make_query()
	{
		$month = $this->input->get('month');
		$year = date("Y");
		$date_from=$year."-".$month."-01";
		$date_to=$year."-".$month."-31";
        $order_column = array("a.id","b.company_name","a.company_website","a.manual_update_date" ,"a.renewel_date","a.net_amt,a.ssl_status",);  
		$this->db->select('a.*,b.company_name');
		$this->db->from('add_ssl_remainder a');
		$this->db->join('client_master b','b.id=a.company_id','left');
		// $this->db->join('company_website c','c.website=a.company_website','left');
		if(!empty($month)){
			$this->db->where("a.renewel_date>=",$date_from );  
			$this->db->where("a.renewel_date<=",$date_to );  
		}
		if(isset($_POST["search"]["value"])){
            $this->db->group_start();
                $this->db->like("a.id", $_POST["search"]["value"]);  
                $this->db->or_like("b.company_name", $_POST["search"]["value"]);   
                $this->db->or_like("a.company_website", $_POST["search"]["value"]);
				$this->db->or_like("a.type", $_POST["search"]["value"]);
				$this->db->or_like("a.manual_update_date", $_POST["search"]["value"]);
				$this->db->or_like("a.renewel_date", $_POST["search"]["value"]); 
				$this->db->or_like("a.net_amt", $_POST["search"]["value"]); 
				// $this->db->or_like("c.status", $_POST["search"]["value"]); 
            $this->db->group_end();
		}
		if(isset($_POST["order"]))  
        {  
             $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
             $this->db->order_by('renewel_date', 'ASC');  
        }  	
	}

	function get_all_data()
	{
		$this->db->select("*");
		$this->db->from('add_ssl_remainder');
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

	public function save_paid_details()
	{
        $id = $this->input->post('paid_id');
		$paid_date=date("Y-m-d",strtotime($this->input->post('paid_date'))); 
		$paid_amount=$this->input->post('paid_amount'); 
		$gst=$this->input->post('gst'); 
		$net_amt=$this->input->post('net_amt'); 
		$this->db->select('company_id,company_website,type,renewel_date,net_amt');
        $this->db->where('id', $id);
		$query=$this->db->get('add_ssl_remainder');
		$row1=$query->row_array();
		$row2=array("paid_date"=>$paid_date,"paid_amount"=>$paid_amount,"paid_gst"=>$gst,"paid_net_amount"=>$net_amt);
		$row=array_merge($row1, $row2);
		$this->db->insert('paid_ssl_remainder',$row);
		if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
		}
	}

	public function fetch_paid_details()
    {
		$id = $this->input->post('id');
		$this->db->select('id,amount_paid,gst_amt,net_amt');
        $this->db->where('id', $id);
        $query = $this->db->get('add_ssl_remainder');
        $q = $query->row_array();
        return $q;
	}

	// public function update_ssl_view_db()
	// {
	// 	$id = $this->input->post('view_ssl_rec_id');
	// 	$company_id = $this->input->post('company_id');
	// 	$company_website = $this->input->post('company_website');
	// 	$ssl_type_selected = $this->input->post('ssl_type_selected');
	// 	$ssl_status_selected = $this->input->post('ssl_status_selected');
	// 	$manual_update_date = $this->input->post('manual_update_date');
	// 	$renewal_update_date = $this->input->post('renewal_update_date');
	// 	$amount_paid = $this->input->post('amount_paid');
	// 	$gst_amount = $this->input->post('gst_amount');
	// 	$net_amount = $this->input->post('net_amount');
	// 	$data = array(
	// 		"company_id"		=> $company_id,
	// 		"company_website"	=> $company_website,
	// 		"type"				=> $ssl_type_selected,
	// 		"ssl_status	"		=> $ssl_status_selected,
	// 		"manual_update_date" => $manual_update_date,
	// 		"renewel_date"		=> $renewal_update_date,
	// 		"amount_paid"		=> $amount_paid,
	// 		"gst_amt"			=> $gst_amount,
	// 		"net_amt"			=> $net_amount,
	// 	);
	// 	// echo "<pre>";
	// 	// print_r($id);
	// 	// print_r($data);
	// 	// exit;
	// 	if ($id != '' || !empty($id)) {
	// 		$this->db->where('id', $id);
	// 		if ($this->db->update('add_ssl_remainder', $data)) {
	// 			return "update";
	// 		} else {
	// 			return "not_update";
	// 		}
	// 	}
	// }

	// function getPaidDate($company_id = null, $company_website = null)
	// {
	// 	$this->db->select('paid_date,paid_amount');
	// 	$this->db->where('company_id', $company_id);
	// 	$this->db->where('company_website', $company_website);
	// 	$query = $this->db->get('paid_ssl_remainder')->result();

	// 	return $query;
	// }
	
	function ssl_master_delete()
    {  
		$id=$this->input->post('id');
        $this->db->where('id', $id);
        if($this->db->delete('add_ssl_remainder'))
        {
            return true;
        }
	}
	public function fetch_gst()
    {
        $this->db->select('*');
        $this->db->from('gst');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}
