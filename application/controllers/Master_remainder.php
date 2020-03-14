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
			$this->load->view('master_remainder/index');
		}
		function add_new()
		{
			$this->load->view('master_remainder/add_new');
		}
		function notify()
		{
			exit;
			 
			$data['fetch_master_remainder_db'] = $this->master_remainder->fetch_master_remainder_db();
			$data['fetch_notify_ssl_remainder_db'] = $this->master_remainder->fetch_notify_ssl_remainder_db();
				 
			foreach ($data['fetch_notify_ssl_remainder_db'] as $row) {
				$remainder_company_names[] = $row['company_name'];
				$remainder_websites[] = $row['company_website'];
				$remainder_amount[] = $row['amount_paid'];
				$remainder_gst_amt[] = $row['gst_amt'];
				$remainder_net_amt[] = $row['net_amt'];
				$remainder_renewel_date[] = $row['renewel_date'];
			}
			foreach ($data['fetch_master_remainder_db'] as $row) {
				$remainder_name[] = $row['remainder_name'];
				$phone[] = $row['phone'];
				$email[] = $row['email'];
				
			}
			// $this->arr_op( $email );
			// exit;
			for ($i = 0; $i < count($remainder_company_names); $i++) { 
				//----------------------------------------------------------SMS CODE 
				try {
					$curl = curl_init();
					$message = 'SSL Renewal Reminder
								 
								Company Name:'.$remainder_company_names[$i].'
								Website:'.$remainder_websites[$i].'
								Amount :'.$remainder_amount[$i].'
								GST @ 18 :'.$remainder_gst_amt[$i].'
								Net :'.$remainder_net_amt[$i].'
								Renewal Date:'. date("d-m-Y", strtotime($remainder_renewel_date[$i])).'

								Pending SSL Renewal payment to be paid within final renewal date. 

					Thanks,
					Webomindapps HR.
					';
					$message = urlencode($message);
					$number = $phone[$i];
					// $number = 8668120415;

					$number = urlencode($number);
					curl_setopt_array($curl, array(
						CURLOPT_URL => "http://mindappssms.in/submitsms.jsp?user=webomind&key=ca93e6230aXX&mobile=" . $number . "&message=" . $message . "&senderid=NOTIFY&accusage=1",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
					));

					$response = curl_exec($curl);

					curl_close($curl);
					// echo $response;
				} catch (Exception $e) {
					// throw new Exception("Invalid URL",0,$e);
				}
				//----------------------------------------------------------SMS CODE END


				//----------------------------------------------------------MAIL CODE
				$this->load->config('email');
				$this->load->library('email');
				$from = $this->config->item('smtp_user');
				$this->email->set_newline("\r\n");
				$this->email->from($from, 'Webomindapps'); 
				$this->email->to($email[$i]); 
				// $this->email->to("madhusudhandummy@gmail.com");
				$subject = "SSL Renewal Reminder";
				$this->email->subject($subject);
				$message = $this->load->view('master_remainder/mail_format', $data, TRUE);
				$this->email->message($message);
				if ($this->email->send()) {
					//echo "<script>alert('Remainder Sent')</script>";
				}
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
			$msg="";
			$to_email = $this->input->post('email');
			$pass = $this->input->post('pass');
			$insert_status = $this->master_remainder->save_master_remainder();
			if ($insert_status == "insert") {
				$msg = "Inserted successfully";

				$this->load->config('email');
				$this->load->library('email');
				$subject = "welcome";
				$message = "From now you are webomindapps admin";
				$from = $this->config->item('smtp_user');
				$to =$to_email;
				$this->email->set_newline("\r\n");
				$this->email->from($from, 'Webomindapps');
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();

			} else if ($insert_status == "exist") {
				$msg = "Email already exist";
			} else if ($insert_status == "update") {
				$msg = "Updated successfully";
				if($pass!='' || !empty($pass))
				{
					$this->load->config('email');
					$this->load->library('email');
					$subject = "welcome";
					$message = "Some one change your webomindapsps admin password";
					$from = $this->config->item('smtp_user');
					$to =$to_email;
					$this->email->set_newline("\r\n");
					$this->email->from($from, 'Webomindapps');
					$this->email->to($to);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();

				}
			}else if ($insert_status == "pass_wrong") {
				$msg = "Your passwrod and conformation password mismatched";
			}
			$this->session->set_flashdata('success', $msg);
			redirect('master-remainder', 'refresh');
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
		}
		public function arr_op($arr){ 
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
