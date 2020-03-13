 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_update extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ssl_update_db', 'ssl_update');
		$this->load->library("pagination");
	}

	//view the html index 
	function index()
	{
		$this->load->view('ssl_update/index');
	}
	
	public function get_all_data($var = null) //created for implementing data tables
	{
		$fetch_data = $this->ssl_update->make_datatables();
		$data = array();
		// $status = '<span class="badge bg-blue">Completed</span>';
		$i = 0;
		foreach ($fetch_data as $row) {
			$sub_array   = array();
			$sub_array[] = ++$i;
			$sub_array[] = $row->company_name;
			$sub_array[] = $row->company_website; 
			$sub_array[] = $row->net_amt;
			$sub_array[] = date("d-m-Y", strtotime($row->manual_update_date));
			$sub_array[] = date("d-m-Y", strtotime($row->renewel_date));
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
			"recordsTotal"        =>     $this->ssl_update->get_all_data(),
			"recordsFiltered"     =>     $this->ssl_update->get_filtered_data(),
			"data" => $data
		);
		echo json_encode($output);
	}
	
}
?>