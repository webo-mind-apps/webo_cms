 
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
							 <a href="javascript:void(0)" id=' . $row->id . '   onclick="client_master_edit(this.id);" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="delete_client_master(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
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
        $i=0;
        $count=count($data);
		echo '
					<div class="modal-header bg-primary">
						<h6 class="modal-title">' . ucwords($data[0]['company_name']) . '</h6>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8"> 
                        <table class="mod-table">
                                <tr><td>Company Name</td><td>:</td><td>'.ucwords($data[0]['company_name']).'</td></tr>
                                <tr><td>Client Name</td><td>:</td><td>'.ucwords($data[0]['client_name']).'</td></tr>
                                <tr><td>Phone No.</td><td>:</td><td>'.ucwords($data[0]['phone']).'</td></tr>
                                <tr><td>Email Id</td><td>:</td><td>'.ucwords($data[0]['email']).'</td></tr>
                                <tr><td>Website Name</td><td>:</td><td></td></tr>';
                                if($data[0]['website']!='' || !empty($data[0]['website'])){
                                foreach($data as $row)
                                    {
                                        if($row['status']==1){$checked="";}else{$checked="checked";}
                                        echo '<tr><td></td><td></td><td><input type="checkbox"  '.$checked.' style="height:18px;width:18px;cursor:pointer " class="checkbox" name="checkbox" id="'. $row['site_id'] .'" value="' .$row['status']. '">';if($row['status']==1){echo '<span class="danger">'.$row['website'].'</span>';}else{echo '<span>'.$row['website'].'</span>';} echo'</span></td></tr>';
                                        $i++;
                                    }
                                } 
                                    echo '
                            </table>
                        </div>
                        <div class="col-sm-2"></div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn bg-primary" data-dismiss="modal">Close</button>
					</div>';
	}
    //save the index page form value to the database
    function save_client_master()
    {
        if($this->client_master->save_client_master())
        {
            $exist=0;
            $insert=0;
            $website=$this->input->post('website_name');
            $company_name=$this->input->post('company_name'); 
            foreach($website as $key =>$row)
            {
                $company_id=$this->client_master->get_client_master_company_id($company_name);
                $datas = array(
                    "company_id"			=>$company_id['id'],
                    "website"				=> $row,
                );
                $insert_status=$this->client_master->save_website($datas);
                if($insert_status=="insert")
                {
                    $insert++;
                }
                else if($insert_status=="exist")
                {
                    $exist++;
                }
            }
            if($exist!=0 && $insert!=0)
            {
             $msg = "Inserted successfully<br>".$exist." website already exist";
            }
            else
            {
                $msg = "Inserted successfully"; 
            }
            $this->session->set_flashdata('success', $msg);
            redirect('client-master', 'refresh');
        }  
        redirect('client-master', 'refresh');
    }
    function edit_client_master()
    {
        if($this->client_master->edit_client_master())
        {
             $msg = "Updated successfully";
             $this->session->set_flashdata('success', $msg);
        }
        redirect('client-master', 'refresh');
    }
    
    function edit_client()
    {
        $id = $this->input->post('id');
        $data = $this->client_master->client_master_view_details($id);
        $i=0;
		echo '<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <div class="content">
        <form method="post" id="frm" action="'.base_url().'client-master/edit-client-master">
           <div class="modal-body">
              <div class="form-group">
                 <label class="down">Company Name</label>
                 <div class="input-group">
                    <input type="text" id="company-name" class="form-control"  name="company_name" minlength="3" maxlength="100" value="'.$data[0]['company_name'].'" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="down">Client Name</label>
                 <div class="input-group">
                    <input type="text" id="client-name" class="form-control" name="client_name" minlength="3" maxlength="25" onkeypress="return isalpha();" value="'.$data[0]['client_name'].'" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="down">Phone No.</label>
                 <div class="input-group">
                    <input type="text" id="phone1" class="form-control" name="phone" maxlength="10" minlength="10" onkeypress="return isNumber();" onfocusout="phone_length();" value="'.$data[0]['phone'].'" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="down">Email Id</label>
                 <div class="input-group">
                    <input type="email" id="email1" class="form-control"  name="email"  
                       onfocusout="email_validation();" value="'.$data[0]['email'].'" required>
                 </div>
              </div>
                <input type="hidden" name="id" value="'.$id.'">
           </div>
           <div class="modal-footer down">
              <button  type="submit" name="insert_button" class="insert btn btn-primary" >Submit<i class="icon-paperplane ml-2"></i></button>
           </div>
        </form> 
     </div>';
    }
    // onclick="edit_client_master();"
    function delete_client()
	{
        if ($this->client_master->delete_client())
        {
           echo "deleted successfully";
        }
        redirect('client-master', 'refresh');
    }
    function website_status_change()
	{
        if ($this->client_master->website_status_change())
        {
            echo "1";
        }
        redirect('client-master', 'refresh');
    }
}
?>