 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Month_renewal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('month_renewal_db', 'month_reneweal');
		$this->load->library("pagination");
    }

    //view the html index 
    function index()
    {
        $this->load->view('month_renewal/index');
    }

    public function get_all_data($var = null) //created for implementing data tables
	{
			$fetch_data = $this->month_reneweal->make_datatables();
			$data = array();
			// $status = '<span class="badge bg-blue">Completed</span>';
			$i = 0;
			foreach ($fetch_data as $row) {
				// if($row->renewel_date<date('yy-mm-d')){echo '<style></style>'}
				$sub_array   = array();
				$sub_array[] = ++$i;
				$sub_array[] = $row->company_name; 
				$sub_array[] = $row->company_website;
				$sub_array[] = $row->type;
				$sub_array[] = $row->amount_paid;
				//$sub_array[] = date("d-m-Y", strtotime($row->manual_update_date));
				$sub_array[] = date("d-m-Y", strtotime($row->renewel_date));
				
				// $sub_array[] = '<div class="check_date"><input id="paid_date'.$row->id.'" type="text" name="paid_date'.$row->id.'" 
				// class="form-control paid_date" autocomplete="off"><input id="renewel'.$row->id.'" class="renewel_date" type="hidden" value="'.$row->renewel_date.'"></div>';
				// $sub_array[] = '<div class="check_amount"><input id="paid_amount'.$row->id.'"  type="text" name="paid_amount'.$row->id.'" 
				// class="form-control paid_amount" onkeypress="return isNumber();" autocomplete="off"></div>';
				// $sub_array[] = '<button type="button" id="'.$row->id.'" class="btn bg-primary" onclick="client_paid_date_details(this.id);" >save</button>';
				$data[] = $sub_array;
			}
			$output = array(
				"draw"                =>     intval($_POST["draw"]),
				"recordsTotal"        =>     $this->month_reneweal->get_all_data(),
				"recordsFiltered"     =>     $this->month_reneweal->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);  
		
	}
	
}
?>