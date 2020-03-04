 
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

        }  
    }
}
?>