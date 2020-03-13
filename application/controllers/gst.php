 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Gst extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gst_master_db','gst_db');
    }

    function index()
    { 
        $this->load->view('gst/index');
    } 
    function percentage_insert()
    { 
        if ($this->gst_db->insert_gst_per_db()) {
            $msg="GST Percentage Updated";
            $this->session->set_flashdata('success',  $msg);
        }  
        redirect('gst-per/'); 
    } 
     
}


?>