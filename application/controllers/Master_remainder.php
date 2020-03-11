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

	public function index()
	{
		// $this->notify();
		// // $remainder_name['remainder_name'] = "fdafa";
		// // $this->load->view('master_remainder/mail_format',$remainder_name);

		// exit;
		$this->load->view('master_remainder/index');
	}
	function add_new()
    {
        $this->load->view('master_remainder/add_new');
    }
	function notify()
	{
		$data['notify_master_remainder_db'] = $this->master_remainder->notify_master_remainder_db();
		$data['notify_client_remainder_db'] = $this->master_remainder->notify_client_remainder_db();

		foreach ($data['notify_master_remainder_db'] as $row) {
			$remainder_names[] = $row['remainder_name'];
			$remainder_emails[] = $row['email'];
			$remainder_phones[] = $row['phone'];
		}
		foreach ($data['notify_client_remainder_db'] as $row) {
			$remainder_company_names[] = $row['company_name'];
			$remainder_names[] = $row['client_name'];
			$remainder_emails[] = $row['email'];
			$remainder_phones[] = $row['phone'];
		}

		for ($i = 0; $i <= count($remainder_names); $i++) {

			$this->arr_op($remainder_company_names);
			//----------------------------------------------------------SMS CODE 
			// try {
			// 	$curl = curl_init();
			// 	$message = "hi madhu working";
			// 	$message = urlencode($message);
			// 	$number = $remainder_phones[$i];

			// 	$number = urlencode($number);
			// 	curl_setopt_array($curl, array(
			// 		CURLOPT_URL => "http://mindappssms.in/submitsms.jsp?user=webomind&key=ca93e6230aXX&mobile=" . $number . "&message=" . $message . "&senderid=NOTIFY&accusage=1",
			// 		CURLOPT_RETURNTRANSFER => true,
			// 		CURLOPT_ENCODING => "",
			// 		CURLOPT_MAXREDIRS => 10,
			// 		CURLOPT_TIMEOUT => 0,
			// 		CURLOPT_FOLLOWLOCATION => true,
			// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			// 		CURLOPT_CUSTOMREQUEST => "GET",
			// 	));

			// 	$response = curl_exec($curl);

			// 	curl_close($curl);
			// 	// echo $response;
			// } catch (Exception $e) {
			// 	// throw new Exception("Invalid URL",0,$e);
			// }
			//----------------------------------------------------------SMS CODE END


			//----------------------------------------------------------MAIL CODE
			// $this->load->config('email');
			// $this->load->library('email');
			// $from = $this->config->item('smtp_user');
			// $this->email->set_newline("\r\n");
			// $this->email->from($from, 'WebOmind Apps');
			// $this->email->to($remainder_emails[$i]);
			// $subject = "Renewal Date";
			// $this->email->subject($subject);
			// $message = $this->load->view('master_remainder/mail_format', $data, TRUE);
			// $this->email->message($message);
			// if ($this->email->send()) {
			// 	//echo "<script>alert('Remainder Sent')</script>";
			// }
			//----------------------------------------------------------MAIL CODE END
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
							 <a href="master-remainder/master-remainder-edit-details/'.$row->id.'"  class="dropdown-item"  ><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="master_remainder_delete(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
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
		}else if ($insert_status == "pass_wrong") {
			$msg = "Your passwrod and conformation password mismatched";
		}
		$this->session->set_flashdata('success', $msg);
		redirect('Master_remainder', 'refresh');
	}
	function edit_remainder_master()
	{
		$data = $this->master_remainder->edit_remainder_master();
		echo json_encode($data);
	}
	function master_remainder_delete()
	{

		if ($this->master_remainder->master_remainder_delete()) {
			echo "Deleted successfully";
		}
		redirect('master-remainder', 'refresh');
	}

	function arr_op($arr)
	{
		echo "<pre>";
		print_r($arr);
		exit;
	}
	function master_remainder_edit_details($id)
    {
        $data['data'] = $this->master_remainder->master_remainder_edit_details($id);
        $this->load->view('master_remainder/add_new',$data);
      
    }
}
?>