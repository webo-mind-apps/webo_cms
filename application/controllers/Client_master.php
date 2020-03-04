 
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

    function index()
    {
        $this->load->view('client_master/index');
    }

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
            if($exist!=0)
            {
             $msg = $insert." company webiste inserted successfully<br>".$exist." website already exist";
            }
            else
            {
                $msg = $insert." company webiste inserted successfully"; 
            }
            $this->session->set_flashdata('success', $msg);
            redirect('client-master', 'refresh');

        }  
    }
}
?>