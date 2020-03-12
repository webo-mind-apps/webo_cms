 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_view extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ssl_view_db', 'ssl_view');
		$this->load->library("pagination");
	}

	//view the html index 
	function index()
	{
		$this->load->view('ssl_view/index');
	}


	public function get_all_data($var = null) //created for implementing data tables
	{
		$fetch_data = $this->ssl_view->make_datatables();
		$data = array();
		// $status = '<span class="badge bg-blue">Completed</span>';
		$i = 0;
		// echo "<pre>";
		// print_r($fetch_data);
		// exit;
		foreach ($fetch_data as $row) {
			//++$i;
			//if($row->status==1){$j=$i.'<i class="fa fa-pencil"></i>';}else{$j=$i;}
			$sub_array   = array();
			$sub_array[] = ++$i;
			$sub_array[] = $row->company_name;
			$sub_array[] = $row->company_website; 
			$sub_array[] = $row->net_amt;
			$sub_array[] = date("d-m-Y", strtotime($row->manual_update_date));
			$sub_array[] = date("d-m-Y", strtotime($row->renewel_date));

			$sub_array[] = '<div class="check_date"><input id="paid_date' . $row->id . '" type="text" name="paid_date' . $row->id . '" 
				class="form-control paid_date" autocomplete="off" style="padding:3px 0px 3px 0px;"><input id="renewel' . $row->id . '" class="renewel_date" type="hidden" value="' . $row->renewel_date . '"></div>';
			$sub_array[] = '<div class="check_amount"><input id="paid_amount' . $row->id . '"  type="text" name="paid_amount' . $row->id . '" 
				class="form-control paid_amount" onkeypress="return isNumber();" autocomplete="off" style="padding:3px 0px 3px 0px;"></div>';
			$sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="#" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
							 <a href="service-master/service-master-edit-details/' . $row->id . '" id=' . $row->id . ' class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>

							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="client_paid_date_details(this.id);" class="dropdown-item"><i class="fas fa-save"></i>Save</a>
						 </div>
					 </div>
				 </div>';

			$data[] = $sub_array;
		}
		// $sub_array[] = '<button type="button" id="' . $row->id . '" class="btn bg-primary" onclick="client_paid_date_details(this.id);" >save</button>';
		$output = array(
			"draw"                =>     intval($_POST["draw"]),
			"recordsTotal"        =>     $this->ssl_view->get_all_data(),
			"recordsFiltered"     =>     $this->ssl_view->get_filtered_data(),
			"data" => $data
		);
		echo json_encode($output);
	}
	function client_paid_date_details()
	{
		if ($this->ssl_view->client_paid_date_details()) {
			// echo "Inserted successfully";
			$msg = "Inserted successfully";
			$this->session->set_flashdata('success', $msg);
		}
		redirect('Ssl_view', 'refresh');
	}
}
?>