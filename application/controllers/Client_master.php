
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Client_master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_master_db', 'client_master');
        $this->load->library("pagination");
    }

    //view the html index 
    function index()
    {
        $this->load->view('client_master/index');
    }
    function add_new()
    {
        $this->load->view('client_master/add_new');
    }

    public function get_all_data($var = null) //created for implementing data tables
    {
        $fetch_data = $this->client_master->make_datatables();
        $data = array();
        // $status = '<span class="badge bg-blue">Completed</span>';
        $i = 0;
        foreach ($fetch_data as $row) {
            $sub_array   = array();
            $sub_array[] = ++$i;
            $sub_array[] = $row->company_name;
            $sub_array[] = $row->client_name;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->email;
            $sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="#" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
                             <a href="javascript:void(0)" id=' . $row->id . '
                              onclick="client_master_view_details(this.id);" class="dropdown-item"><i class="fa fa-eye"></i> View Details</a>
							 <a href="client-master/client-master-edit-details/' . $row->id . '"  class="dropdown-item edit"><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="client_master_delete(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
						 </div>
					 </div>
				 </div>
					 ';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->client_master->get_all_data(),
            "recordsFiltered"     =>     $this->client_master->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }
    function client_master_view_details()
    {
        $id = $this->input->post('id');
        $data = $this->client_master->client_master_view_details($id);
        $i = 0;
        $count = count($data);
        echo '  
              <div class="modal-header details-heading">
		 				<h6 class="modal-title">'. ucwords($data[0]['company_name']) . '</h6>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
                    <div class="row">
                        <ul class="detail-list">
                            <li><p class="list-title">Company Name</p><p>' . ucwords($data[0]['company_name']) . '</p></li>
                            <li><p class="list-title">Client Name</p><p>' . ucwords($data[0]['client_name']) . '</p></li>
                            <li><p class="list-title">Email Id</p><p>' . $data[0]['email']. '</p></li>
                            <li><p class="list-title">Alter Email Id</p><p>' .(!empty($data[0]['alt_email'])?$data[0]['alt_email']:'no-data'). '</p></li>
                            <li><p class="list-title">Phone No.</p><p>' . ucwords($data[0]['phone']) . '</p></li>
                            <li><p class="list-title">Alter Phone No.</p><p>' .(!empty($data[0]['alt_phone'])?$data[0]['alt_phone']:'no-data'). '</p></li>
                            <li><p class="list-title">Address</p><p>' . ucwords($data[0]['address']) . '</p></li>
                            <li><p class="list-title">Website Name</p>';
                            if ($data[0]['website'] != '' || !empty($data[0]['website'])) {
                                foreach ($data as $row) {
                                    if ($row['status'] == 1) {
                                        $checked = "";
                                    } else {
                                        $checked = "checked";
                                    }
                                    echo '<p class="web"><input type="checkbox"  ' . $checked . ' style="cursor:pointer "  name="checkbox" id="' . $row['site_id'] . '" value="' . $row['status'] . '" class="checkbox">';
                                    if ($row['status'] == 1) {
                                        echo '<span class="danger">' . $row['website'] . '</span>';
                                    } else {
                                        echo '<span>' . $row['website'] . '</span>';
                                    }
                                    echo '</span></p>';
                                    $i++;
                                }
                            }
                            echo '
                            </li></ul>
                        </div>
                        </div>';
    }
    // <div class="modal-footer">
	// 					<button type="button" class="btn bg-primary" data-dismiss="modal">Close</button>
	// 				</div>
    //save the index page form value to the database
    function save_client_master()
    {
        $status = $this->client_master->save_client_master();
        if ($status == "update") {
            if($this->client_master->save_website())
            {
                $msg = "updated successfully";
            }
        } else if ($status == "true") {
           
            if($this->client_master->save_website())
            {
                $msg = "Inserted successfully";
            }
           
        }
        else if ($status == "email") {
            $msg = "This E-mail Id already exist give another E-mail Id";
        }
        else if ($status == "phone") {
            $msg = "This Phone No. already exist give another number";
        }
       
        $this->session->set_flashdata('success', $msg);
        redirect('client-master', 'refresh');
    }
    function client_master_delete()
    {
        if ($this->client_master->client_master_delete()) {
            echo "deleted successfully";
        }
        redirect('client-master', 'refresh');
    }
    function website_status_change()
    {
        if ($this->client_master->website_status_change()) {
            echo "1";
        }
        redirect('client-master', 'refresh');
    }
    function client_master_edit_details($id)
    {
        $data['data'] = $this->client_master->client_master_edit_details($id);
        $this->load->view('client_master/add_new', $data);
    }
}
?>

