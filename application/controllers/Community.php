<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('community_model');
    }

    public function get_updates(){

        $subno = $this->community_model->get_update_number();

        echo json_encode($subno);
    }

}