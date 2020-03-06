 
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

    public function get_all_data($var = null) //created for implementing data tables
	{
			$fetch_data = $this->ssl_view->make_datatables();
			$data = array();
			// $status = '<span class="badge bg-blue">Completed</span>';
			$i = 0;
			foreach ($fetch_data as $row) {
				$sub_array   = array();
				$sub_array[] = ++$i;
				$sub_array[] = $row->company_name; 
				$sub_array[] = $row->website;
				$sub_array[] = $row->type;
                $sub_array[] = $row->amount;
				$sub_array[] = '<input id="To" type="text" name="ren_date[]" class="form-control" autocomplete="off">';
				$sub_array[] = '<button type="button" id="'.$row->id.'" class="btn bg-primary" >save</button>';
				$data[] = $sub_array;
			}
			$output = array(
				"draw"                =>     intval($_POST["draw"]),
				"recordsTotal"        =>     $this->ssl_view->get_all_data(),
				"recordsFiltered"     =>     $this->ssl_view->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);  
		
    }
}
?>