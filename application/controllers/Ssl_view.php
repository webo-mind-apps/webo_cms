 
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

	function ssl_view_edit_details($id)
	{
		// $data['data'] = $this->ssl_view->ssl_view_edit_details_db($id);
		$this->load->view('ssl_view/edit_data');
	}

	function view_ssl_details()
	{
		$id = $this->input->post('id');
		$data = $this->ssl_view->view_ssl_details_db($id);
		$i = 0;
		$count = count($data);

		echo '
            <div class="modal-header bg-primary">
                <h6 class="modal-title">' . ucwords($data[0]['company_name']) . '</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <table class="mod-table">
                            <tr><th>Client Name</th><td>:</td><td>' . ucwords($data[0]['client_name']) . '</td></tr>
                            <tr><th>Company Name</th><td>:</td><td>' . ucwords($data[0]['company_name']) . '</td></tr>
                            <tr><th>Company website</th><td>:</td><td>' . ucwords($data[0]['company_website']) . '</td></tr>
                            <tr><th>Update Method</th><td>:</td><td>' . ucwords($data[0]['type']) . '</td></tr>
							<tr><th>Amout Pay</th><td>:</td><td>' . ucwords($data[0]['amount_paid']) . '</td></tr>
							<tr><th>Status</th><td>:</td><td>' . ucwords($data[0]['ssl_status'] ? "Active" : "InActive") . '</td></tr>
							<tr><th>Update Date</th><td>:</td><td>' . ucwords($data[0]['manual_update_date']) . '</td></tr>
                            <tr><th>Renewel Date</th><td>:</td><td>' . ucwords($data[0]['renewel_date']) . '</td></tr> 
                            <tr><th>Phone No.</th><td>:</td><td>' . ucwords($data[0]['phone']) . '</td></tr> 
                            <tr><th>Email Id</th><td>:</td><td>' . ucwords($data[0]['email']) . '</td></tr>  
                    </table>
                </div>
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-primary" data-dismiss="modal">Close</button>
            </div>';
	}

	public function get_all_data($var = null) //created for implementing data tables
	{
		$fetch_data = $this->ssl_view->make_datatables();
		$data = array();
		// $status = '<span class="badge bg-blue">Completed</span>';
		$i = 0;
		foreach ($fetch_data as $row) {
			// if($row->renewel_date<date('yy-mm-d')){echo '<style></style>'}
			$sub_array   = array();
			$sub_array[] = ++$i;
			$sub_array[] = $row->company_name;
			$sub_array[] = $row->company_website;
			$sub_array[] = $row->amount_paid;
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
							<a href="javascript:void(0)" id=' . $row->id . '
							onclick="view_ssl_details(this.id);" class="dropdown-item"><i class="fa fa-eye"></i> View Details</a>
							
							 <a href="ssl-view/ssl-view-edi-details/' . $row->id . '" id=' . $row->id . ' class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>

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

	function arr_op($arr)
	{
		echo "<pre>";
		print_r($arr);
		exit;
	}
}
?>