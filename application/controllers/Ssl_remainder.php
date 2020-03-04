 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ssl_remainder extends CI_Controller
{
    public function __construct()
    {   
        parent::__construct();
    }

    function index()
    {
        $this->load->view('ssl_remainder/index');
    }

    function admin_login()
    {
        if ($this->model->admin_login_check()) {
            redirect('Doctor_control/admin_panel');
        } else {
            $this->load->view('admin-worldsclinicalguide/admin_login');
        }
    }
}
?>