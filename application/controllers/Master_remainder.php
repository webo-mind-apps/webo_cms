 <?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master_remainder extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_remainder_db', 'master_remainder');
		$this->load->library("pagination");
	}

	function index()
	{
		// $this->notify();
		// exit;
		$this->load->view('master_remainder/index');
	}
	function add_new()
    {
        $this->load->view('master_remainder/add_new');
    }
	function notify()
	{
		$this->load->config('email');
		$this->load->library('email');
		$from = $this->config->item('smtp_user');
		$to = "madhusudhandummy@gmail.com";
		$this->email->set_newline("\r\n");
		$this->email->from($from, 'Fretus folks india');
		$this->email->to($to);
		$subject = "Renewal Date";
		$this->email->subject($subject);
		$message = "Need to renwal before all this";
		$this->email->message($message);
		if ($this->email->send()) {
			echo "sent";
			// exit;
		} else {
			echo "not sent";
			// exit;
		}
	}
	public function get_all_data($var = null) //created for implementing data tables
	{
		$fetch_data = $this->master_remainder->make_datatables();
		$data = array();
		// $status = '<span class="badge bg-blue">Completed</span>';
		$i = 0;
		foreach ($fetch_data as $row) {
			$sub_array   = array();
			$sub_array[] = ++$i;
			$sub_array[] = $row->remainder_name;
			$sub_array[] = $row->phone;
			$sub_array[] = $row->email;
			$sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="#" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
							 <a href="javascript:void(0)" id="' . $row->id . '"  class="dropdown-item" onclick="edit_master_remainder(this.id);" data-toggle="modal" data-target="#fetchData"><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="delete_master_remainder(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
						 </div>
					 </div>
				 </div>
					 ';
			$data[] = $sub_array;
		}
		$output = array(
			"draw"                =>     intval($_POST["draw"]),
			"recordsTotal"        =>     $this->master_remainder->get_all_data(),
			"recordsFiltered"     =>     $this->master_remainder->get_filtered_data(),
			"data" => $data
		);
		echo json_encode($output);
	}
	function save_master_remainder()
	{
		$insert_status = $this->master_remainder->save_master_remainder();
		if ($insert_status == "insert") {
			$msg = "Inserted successfully";
		} else if ($insert_status == "exist") {
			$msg = "Email already exist";
		} else if ($insert_status == "update") {
			$msg = "Updated successfully";
		}
		$this->session->set_flashdata('success', $msg);
		redirect('Master_remainder', 'refresh');
	}
	function edit_remainder_master()
	{
		$data = $this->master_remainder->edit_remainder_master();
		echo json_encode($data);
	}
	function delete_remainder_master()
	{

		if ($this->master_remainder->delete_remainder_master()) {
			echo "Deleted successfully";
		}
		redirect('master-remainder', 'refresh');
	}
}
?>