 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_update extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ssl_update_db', 'ssl_update');
		$this->load->library("pagination");
	}

	//view the html index 
	function index()
	{
		$this->load->view('ssl_update/index');
	}
	
	public function get_all_data($var = null) //created for implementing data tables
	{
		$fetch_data = $this->ssl_update->make_datatables();
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
			$sub_array[] = date("d-m-Y", strtotime($row->renewel_date));
			$sub_array[] = date("d-m-Y", strtotime($row->manual_update_date));
			$sub_array[] = '<a href="javascript:void(0)" id=' . $row->id . '
			onclick="ssl_update(this.id);" class="dropdown-item"><button type="button" class="btn bg-primary" style="padding:3px 10px 3px 10px">Update</button></a>';

			$data[] = $sub_array;
		}
		// $sub_array[] = '<button type="button" id="' . $row->id . '" class="btn bg-primary" onclick="client_paid_date_details(this.id);" >save</button>';
		$output = array(
			"draw"                =>     intval($_POST["draw"]),
			"recordsTotal"        =>     $this->ssl_update->get_all_data(),
			"recordsFiltered"     =>     $this->ssl_update->get_filtered_data(),
			"data" => $data
		);
		echo json_encode($output);
	}
	function ssl_update()
    {
        if ($this->ssl_update->ssl_update()) {
            echo "updated successfully";
        }
        
    }
}
?>