 <?php
	defined('BASEPATH') or exit('No direct script access allowed');
	class Master_reminder extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('master_reminder_db', 'master_reminder');
			$this->load->library("pagination");
		}

		public function index()
		{
			$this->load->view('master_reminder/index');
			$this->notify();  

		}
		function add_new()
		{
			$this->load->view('master_reminder/add_new');
		}
		function notify()
		{
			exit;
			 
			$data['fetch_master_reminder_db'] = $this->master_reminder->fetch_master_reminder_db();
			$data['fetch_notify_ssl_reminder_db'] = $this->master_reminder->fetch_notify_ssl_reminder_db(); 
			$data['gst_per_db'] = $this->master_reminder->fetch_gst();
			$gst_per = $data['gst_per_db'][0]['gst_per'];
				 
			foreach ($data['fetch_notify_ssl_reminder_db'] as $row) {
				$reminder_company_names[] = $row['company_name'];
				$reminder_websites[]	  = $row['company_website'];
				$reminder_amount[]        = $row['amount_paid'];
				$gst_amt 			      = $row['amount_paid'] * ($gst_per/100);
				$reminder_gst_amt[]       = $gst_amt;
				$reminder_net_amt[]       = $row['amount_paid'] + $gst_amt;
				$reminder_renewel_date[]  = $row['renewel_date'];
			}
			foreach ($data['fetch_master_reminder_db'] as $row) {
				$reminder_name[] = $row['reminder_name'];
				$phone[] = $row['phone'];
				$email[] = $row['email'];
				
			} 	 
		 
			for ($i = 0; $i < count($reminder_name); $i++) { 
				for ($j = 0; $j < count($reminder_company_names); $j++) {  
						
					//----------------------------------------------------------SMS CODE 
					try {
						$curl = curl_init();
						// $message = $this->load->view('master_reminder/message_format',$data,true);

						$message = 'SSL Renewal Reminder
									
									Company Name : '.$reminder_company_names[$j].'
									Website : '.$reminder_websites[$j].'
									Amount : '.$reminder_amount[$j].'
									GST @ '.$gst_per.' : '.$reminder_gst_amt[$j].'
									Net : '.$reminder_net_amt[$j].'
									Renewal Date : '. date("d-m-Y", strtotime($reminder_renewel_date[$j])).'

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
					$subject = "SSL Renewal Reminder"." ". $reminder_company_names[$j];
					$this->email->subject($subject);
					$data = array('reminder_name'=>$reminder_name[$i],'reminder_company_names'=>$reminder_company_names[$j],'reminder_websites'=>$reminder_websites[$j],'reminder_amount'=>$reminder_amount[$j], 'reminder_gst_amt'=>$reminder_gst_amt[$j],'reminder_net_amt'=>$reminder_net_amt[$j],'reminder_renewel_date'=>$reminder_renewel_date[$j],'gst_per'=>$gst_per);
					// $this->arr_op($data);
					$message = $this->load->view('master_reminder/mail_format', $data, true);
					
					$this->email->message($message);
					if ($this->email->send()) {
						//echo "<script>alert('reminder Sent')</script>";
					}
					//----------------------------------------------------------MAIL CODE END
				}
			}
		}
		public function get_all_data($var = null) //created for implementing data tables
		{
			$fetch_data = $this->master_reminder->make_datatables();
			$data = array();
			// $status = '<span class="badge bg-blue">Completed</span>';
			$i = 0;
			foreach ($fetch_data as $row) {
				$sub_array   = array();
				$sub_array[] = ++$i;
				$sub_array[] = $row->reminder_name;
				$sub_array[] = $row->phone;
				$sub_array[] = $row->email;
				$sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="#" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
							 <a href="master-reminder/master-reminder-edit-details/'.$row->id.'"  class="dropdown-item"  ><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="master_reminder_delete(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
						 </div>
					 </div>
				 </div>
					 ';
				$data[] = $sub_array;
			}
			$output = array(
				"draw"                =>     intval($_POST["draw"]),
				"recordsTotal"        =>     $this->master_reminder->get_all_data(),
				"recordsFiltered"     =>     $this->master_reminder->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);
		}
		
		function save_master_reminder()
		{
			$msg="";
			$to_email = $this->input->post('email');
			$name = $this->input->post('reminder_name');
			$pass = $this->input->post('pass');
			$insert_status = $this->master_reminder->save_master_reminder();
			if ($insert_status == "insert") {
				$msg = "Inserted successfully";

				$this->load->config('email');
				$this->load->library('email');
				$subject = "welcome";
				$message = "Hi ".$name.",<br>Account is created for webomindapps.";
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
					$message = "Hi ".$name.",<br>Your webomindapps admin password is reset check the dashboard.";
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
			redirect('master-reminder', 'refresh');
		}
		function edit_reminder_master()
		{
			$data = $this->master_reminder->edit_reminder_master();
			echo json_encode($data);
		}
		function master_reminder_delete()
		{ 
			if ($this->master_reminder->master_reminder_delete()) {
				echo "Deleted successfully";
			}
		}
		public function arr_op($arr){ 
			// echo count($arr);
			echo "<pre>";
			print_r($arr);
			exit; 
		}
		function master_reminder_edit_details($id)
		{
			$data['data'] = $this->master_reminder->master_reminder_edit_details($id);
			$this->load->view('master_reminder/add_new',$data);
		
		}
	}
?>
