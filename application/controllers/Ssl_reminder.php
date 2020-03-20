 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_reminder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ssl_reminder_db');
    }

    function index()
    {
        $data['company_names_db'] = $this->Ssl_reminder_db->fetch_company_names();
        $data['gst_per_db'] = $this->Ssl_reminder_db->fetch_gst();
        // $this->arr_op( $data);
        $this->load->view('ssl_reminder/index', $data);
    }

    function view_ssl_reminder()
    {
        $data['company_names_db'] = $this->Ssl_reminder_db->fetch_company_names();
        $this->load->view('ssl_reminder/index', $data);
    }

    function dispaly_relavent_websites()
    {
        $company_id = $this->input->post('company_id');
        $data['company_websites_db'] = $this->Ssl_reminder_db->fetch_company_relavent_websites($company_id);
        echo "<option value=''>Select Website</option>";
        foreach ($data['company_websites_db'] as $key => $row) {
            echo '<option value="' . $row['website'] . '">' . $row['website'] . '</option>';
            // echo "<pre>";
            // print_r($data); //3 dimensional
            // print_r($data['company_websites_db']); //2 dimensional
            // print_r($row); //1 dimensional normal array
        }
    }

    function insert_ssl_reminder()
    {
        $msg ="";
        if ("ssl_inserted" == $this->Ssl_reminder_db->insert_ssl_reminder_db()) {
			$msg = "SSL reminder Added";  
        } else {
			$msg = "SSL reminder Exist Updated!";   
        }
        $this->session->set_flashdata('success', $msg); 
        redirect('ssl_reminder/');
    }

    function auto_fill()
    {
        $get_cmp_id = $this->input->post('get_cmp_id');
        $get_cmp_website = $this->input->post('get_cmp_website');
        if ($data = $this->Ssl_reminder_db->check_record_db($get_cmp_id, $get_cmp_website)) {
            echo json_encode($data);
        } else {
            $data = array("manual_update_date" => "", "renewel_date" => "", "net_amt" => "");
            echo json_encode($data);
        }
    }

    function view_ssl_details()
    {
        $id = $this->input->post('id');
        $data = $this->Ssl_reminder_db->view_ssl_details_db($id);
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
                            <tr><th>Amout Pay</th><td>:</td><td>' . ucwords($data[0]['net_amt']) . '</td></tr>
                            <tr><th>Renewel Date</th><td>:</td><td>' . ucwords(date("d-m-Y", strtotime($data[0]['renewel_date']))) . '</td></tr>
                            <tr><th>Paid Date</th><td>:</td><td>' . ucwords(date("d-m-Y", strtotime($data[0]['paid_date']))) . '</td></tr>
                            <tr><th>Paid Amount</th><td>:</td><td>' . ucwords($data[0]['paid_amount']) . '</td></tr>
                            
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

        $fetch_data = $this->Ssl_reminder_db->make_datatables();
        $data = array();
        $i = 0;
        foreach ($fetch_data as $row) {
            $sub_array   = array();
            $sub_array[] = ++$i;
            $sub_array[] = $row->company_name;
            $sub_array[] = $row->company_website;
            $sub_array[] = $row->type;
            $sub_array[] = date("d-m-Y", strtotime($row->renewel_date));
            $sub_array[] = $row->net_amt;
            $sub_array[] = date("d-m-Y", strtotime($row->paid_date));
            $sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
                         <a href="javascript:void(0)" id=' . $row->id . '
                         onclick="view_ssl_details(this.id);" class="dropdown-item"><i class="fa fa-eye"></i> View Details</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="delete_reminder(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
						 </div>
					 </div>
				 </div>
					 ';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->Ssl_reminder_db->get_all_data(),
            "recordsFiltered"     =>     $this->Ssl_reminder_db->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function delete_reminder_fun()
    {
         $this->Ssl_reminder_db->delete_reminder_db(); 
    }
    function arr_op($arr)
    {
        echo "<pre>";
        print_r($arr);
        exit;
    }
}


?>