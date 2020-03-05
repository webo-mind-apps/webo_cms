 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_remainder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ssl_remainder_db');
    }

    function index()
    {
        $data['company_names_db'] = $this->Ssl_remainder_db->fetch_company_names();
        $this->load->view('ssl_remainder/index', $data);
    }
    function view_ssl_remainder()
    {
        $data['company_names_db'] = $this->Ssl_remainder_db->fetch_company_names();
        $this->load->view('ssl_remainder/index', $data);
    }

    function dispaly_relavent_websites()
    {
        $company_name = $this->input->post('company_name');
        $data['company_websites_db'] = $this->Ssl_remainder_db->fetch_company_relavent_websites($company_name);
        foreach ($data['company_websites_db'] as $key => $row) {
            echo '<option value="' . $row['website'] . '">' . $row['website'] . '</option>';
            // echo "<pre>";
            // print_r($data); //3 dimensional
            // print_r($data['company_websites_db']); //2 dimensional
            // print_r($row); //1 dimensional normal array
        }
    }
}
?>