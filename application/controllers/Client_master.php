 
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
                              onclick="client_master_view_details(this.id);" class="dropdown-item"><i class="fa fa-eye"></i>Web site name</a>
							 <a a href="javascript:void(0)" id=' . $row->id . '   onclick="client_master_edit(this.id);" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
							 <a href="javascript:void(0);" id="' . $row->id . '" onclick="delete_candidate(this.id);" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
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
		echo '
					<div class="modal-header bg-primary">
						<h6 class="modal-title">' . ucwords($data[0]['company_name']) . '</h6>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">';
                          foreach($data as $row)
                             {
                                 echo '<i class="fa fa-trash bg-danger" style="margin-right:10px;"></i>'.ucwords($row['website']).'<br>';
                                 $i++;
                             } 
                            echo '
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
                $datas = array(
                    "company_name"			=> $company_name,
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
        // action="'.base_url().'client-master/edit-client-master/'.$id.'"
        $id = $this->input->post('id');
        $data = $this->client_master->client_master_view_details($id);
        $i=0;
		echo '<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <div class="content">
        <form method="post" id="frm">
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
                <input type="hidden" name="id" value="'.$data[0]['id'].'">
           </div>
           <div class="modal-footer down">
              <button  type="submit" name="insert_button" class="insert btn btn-primary" onclick="edit_client_master();">Submit<i class="icon-paperplane ml-2"></i></button>
           </div>
        </form> 
     </div>';
    }
}
?>