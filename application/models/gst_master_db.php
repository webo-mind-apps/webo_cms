<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gst_master_db extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    } 

    function insert_gst_per_db()
    {
        $gst_per = ""; 
        $gst_per = $this->input->post('gst_per'); 
       
        //INSERT CODE---------------------------------------------------/
        $field = array('gst_per' => $gst_per);
        
        
        $query = $this->db->get("gst");
        if($query->num_rows()){
            $this->db->where('id',1); 
            $this->db->update("gst", $field);
            return true; 
        }else{ 
            $this->db->insert("gst", $field);
            return true;
        }
    }  
}
