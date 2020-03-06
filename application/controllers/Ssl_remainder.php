 
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
        echo "<option value=''>Select Website</option>";
        foreach ($data['company_websites_db'] as $key => $row) {
            echo '<option value="' . $row['website'] . '">' . $row['website'] . '</option>';
            // echo "<pre>";
            // print_r($data); //3 dimensional
            // print_r($data['company_websites_db']); //2 dimensional
            // print_r($row); //1 dimensional normal array
        }
    }
    function insert_ssl_remainder()
    {
        if ($data['insert_ssl_datas_db'] = $this->Ssl_remainder_db->insert_ssl_remainder_db()) {
            $this->session->set_flashdata('ssl_remainder_added', 'ssl_remainder_added');
            redirect('ssl_remainder/');
        }
    }
}
?>