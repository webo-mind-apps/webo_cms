 <?php
defined('BASEPATH') or exit('No direct script access allowed');
class Service_master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service_master_db', 'service_master');
		$this->load->library("pagination");
    }

    //view the html index ..........................................................
    function index()
    {
        $this->load->view('service_master/index');
    }
    ///view the html index ..........................................................
    //view the add_new page for add new services.....................................
    function add_new()
    {
        $this->load->view('service_master/add_new');
    }
     //view the add_new page for add new services.....................................
    //Data table coding............................................................................................
    public function get_all_data($var = null) //created for implementing data tables
	{
			$fetch_data = $this->service_master->make_datatables();
			$data = array();
			// $status = '<span class="badge bg-blue">Completed</span>';
			$i = 0;
			foreach ($fetch_data as $row) {
				$sub_array   = array();
				$sub_array[] = ++$i;
				$sub_array[] = $row->service_name; 
				$sub_array[] = $row->hsn_code;
				$sub_array[] = '
					 <div class="list-icons">
					 <div class="dropdown">
						 <a href="#" class="list-icons-item" data-toggle="dropdown">
							 <i class="icon-menu9"></i>
						 </a>
						 <div class="dropdown-menu dropdown-menu-right">
							 <a href="service-master/service-master-edit-details/'.$row->id.'" id=' . $row->id . ' class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="service_master_delete(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
						 </div>
					 </div>
				 </div>
					 '; 
				$data[] = $sub_array;
			}
			$output = array(
				"draw"                =>     intval($_POST["draw"]),
				"recordsTotal"        =>     $this->service_master->get_all_data(),
				"recordsFiltered"     =>     $this->service_master->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);  
		
    }
    ///Data table coding............................................................................................
    //save the add_new page form value to the database.....................................................................
    function save_service_master()
    {
        $insert_status=$this->service_master->save_service_master();
        if($insert_status=="insert")
        {
             $msg = "Inserted successfully";
        }
        else if($insert_status=="exist")
        {
             $msg = "Service already inserted";
        }
        else if($insert_status=="update")
        {
            $msg = "Updated successfully";
        }
        $this->session->set_flashdata('success', $msg);
        redirect('Service_master', 'refresh');
    }
    ///save the add_new page form value to the database.....................................................................
    //fetch the data for updating....................................................................................
    function service_master_edit_details($id)
    {
        $data['data'] = $this->service_master->service_master_edit_details($id);
        $this->load->view('service_master/add_new',$data);
    }
    ///fetch the data for updating....................................................................................
    //delete the service....................................................................................
    function service_master_delete()
    {
        if($data['data'] = $this->service_master->service_master_delete())
        {
            echo "deleted successfully";
        }
        redirect('Service_master', 'refresh');
    }
    ///delete the service....................................................................................
    
}
?>