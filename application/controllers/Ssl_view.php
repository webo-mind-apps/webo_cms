 
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
		$data['gst_per_db'] = $this->ssl_view->fetch_gst();
		$this->load->view('ssl_view/index', $data);
	}

	function ssl_view_edit_details($id)
	{
		$data['gst_per_db'] = $this->ssl_view->fetch_gst();

		$data['data'] = $this->ssl_view->ssl_view_edit_details_db($id);
		$this->load->view('ssl_remainder/index', $data);

		// $this->arr_op($data['data']);
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
							<tr><th>Status</th><td>:</td><td>' . ucwords($data[0]['ssl_status'] ? "InActive" : "Active") . '</td></tr>
							<tr><th>Update Date</th><td>:</td><td>' . ucwords(date("d-m-Y", strtotime($data[0]['manual_update_date']))) . '</td></tr>
                            <tr><th>Renewel Date</th><td>:</td><td>' . ucwords(date("d-m-Y", strtotime($data[0]['renewel_date']))) . '</td></tr> 
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
			++$i;
			if($row->ssl_status==1){$j=$i.'<i class="icon-cross" style="margin:10px 0px 3px 3px;color:black;font-size:7px;"></i>';}else{$j=$i;}
			$sub_array   = array();
			$sub_array[] = $j;
			$sub_array[] = $row->company_name;
			$sub_array[] = $row->company_website;
			$sub_array[] = $row->net_amt;
			$sub_array[] = date("d-m-Y", strtotime($row->manual_update_date));
			$sub_array[] = date("d-m-Y", strtotime($row->renewel_date));

			$sub_array[] = '<a href="javascript:void(0)" id=' . $row->id . '
			onclick="fetch_paid_details(this.id);" class="dropdown-item"><button type="button" class="btn bg-primary" data-toggle="modal" data-target="#fetchData" style="padding:3px 10px 3px 10px">Paid</button></a>';
			$sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="#" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
							<a href="javascript:void(0)" id=' . $row->id . '
							onclick="view_ssl_details(this.id);" class="dropdown-item"><i class="fa fa-eye"></i> View Details</a>
							
							 <a href="ssl-view/ssl-view-edit-details/' . $row->id . '" id=' . $row->id . ' class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="ssl_master_delete(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
						 </div>
					 </div>
				 </div>';
				 	//  <a href="javascript:void(0);" id="' . $row->id . '" onclick="client_paid_date_details(this.id);" class="dropdown-item"><i class="fas fa-save"></i>Save</a>
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
	function save_paid_details()
	{
		if ($this->ssl_view->save_paid_details()) {
			// echo "Inserted successfully";
			$msg = "Inserted successfully";
			$this->session->set_flashdata('success', $msg);
		}
		redirect('Ssl_view', 'refresh');
	}
	function fetch_paid_details()
	{
		$data = $this->ssl_view->fetch_paid_details();
		echo json_encode($data);
	}

	function arr_op($arr)
	{
		echo "<pre>";
		print_r($arr);
		exit;
	}
	// function update_ssl_view()
	// {
	// 	$output = $this->ssl_view->update_ssl_view_db();
	// 	if ($output == "update") {
	// 		$this->session->set_flashdata('updated_ssl_view', 'updated successfully');
	// 		redirect('ssl-view');
	// 	} else {
	// 		echo "not updated";
	// 	}
	// }

	//delete the ssl....................................................................................
    function ssl_master_delete()
    {
        if($data['data'] = $this->ssl_view->ssl_master_delete())
        {
            echo "deleted successfully";
        }
        redirect('Service_master', 'refresh');
    }
    ///delete the ssl....................................................................................
}
?>