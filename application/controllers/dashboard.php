 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_db', 'dashboard_db');
		$this->load->library("pagination");
    }

    //view the html index 
    function index()
    {  
		$data['total_clients_count'] = $this->dashboard_db->fetch_total_clients();
		$data['fetch_total_active_websites'] = $this->dashboard_db->fetch_total_active_websites();
		$data['fetch_total_ssl_reminders'] = $this->dashboard_db->fetch_total_ssl_reminders();
		// echo "<pre>";
		// print_r($data['fetch_total_ssl_reminders']);
		// exit;
        $this->load->view('dashboard/index',$data);
    }

     
}
?>