 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_remainder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ssl_remainder_db');
    }

    function index()
    {
        $data['company_names_db'] = $this->Ssl_remainder_db->fetch_company_names();
        // echo "<pre>";
        // print_r($data);
        // exit;
        $this->load->view('ssl_remainder/index', $data);
    }
    function view_ssl_remainder()
    {
        $data['company_names_db'] = $this->Ssl_remainder_db->fetch_company_names();
        $this->load->view('ssl_remainder/index', $data);
    }

    function dispaly_relavent_websites()
    {
        $company_id = $this->input->post('company_id');
        $data['company_websites_db'] = $this->Ssl_remainder_db->fetch_company_relavent_websites($company_id);
        echo "<option value=''>Select Website</option>";
        foreach ($data['company_websites_db'] as $key => $row) {
            echo '<option value="' . $row['website'] . '">' . $row['website'] . '</option>';
            // echo "<pre>";
            // print_r($data); //3 dimensional
            // print_r($data['company_websites_db']); //2 dimensional
            // print_r($row); //1 dimensional normal array
        }
    }

    function insert_ssl_remainder()
    {
        if ($data['insert_ssl_datas_db'] = $this->Ssl_remainder_db->insert_ssl_remainder_db()) {
            $this->session->set_flashdata('ssl_remainder_added', 'ssl_remainder_added');
        }
        redirect('ssl_remainder/');
    }

    function auto_fill()
    {
        $get_cmp_id = $this->input->post('get_cmp_id');
        $get_cmp_website = $this->input->post('get_cmp_website');
        if ($data = $this->Ssl_remainder_db->check_record_db($get_cmp_id, $get_cmp_website)) {
            echo json_encode($data);
        }
    }

    public function get_all_data($var = null) //created for implementing data tables
    {
        $fetch_data = $this->Ssl_remainder_db->make_datatables();
        $data = array();
        // $status = '<span class="badge bg-blue">Completed</span>';
        $i = 0;
        foreach ($fetch_data as $row) {
            $sub_array   = array();
            $sub_array[] = ++$i;
            $sub_array[] = $row->company_name;
            $sub_array[] = $row->company_website;
            $sub_array[] = $row->type;
            $sub_array[] = $row->manual_update_date;
            $sub_array[] = $row->renewel_date;
            $sub_array[] = $row->amount_paid;
            $sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="#" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
                            
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="delete_remainder(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
						 </div>
					 </div>
				 </div>
					 ';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->Ssl_remainder_db->get_all_data(),
            "recordsFiltered"     =>     $this->Ssl_remainder_db->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);

        //     <a href="javascript:void(0)" id=' . $row->id . '
        //     onclick="client_master_view_details(this.id);" class="dropdown-item"><i class="fa fa-eye"></i>abc</a>
        //    <a a href="javascript:void(0)" id=' . $row->id . '   onclick="client_master_edit(this.id);" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
    }
}

function delete_remainder_fun()
{
    if ($this->Ssl_remainder_db->delete_remainder_db()) {
        echo "deleted";
    }
}
?>