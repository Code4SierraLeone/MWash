<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('subscribers_model');
    }

    public function addsubscriberone(){

        $province = $this->input->post('prov_id');
        $district = $this->input->post('dist_id');
        $chiefdom = $this->input->post('chief_id');
        $phone = $this->input->post('phone');

        if ($this->subscribers_model->create_subscriber_one($province, $district, $chiefdom, $phone)) {

            $success = TRUE;
            echo json_encode($success);

        }else{

            $success = FALSE;
            echo json_encode($success);

        }

    }

    public function add_subscriber_two(){

        $waterpoint_id = $this->input->post('waterp_id');
        $phone = $this->input->post('phone');

        if ($this->subscribers_model->create_subscriber_two($waterpoint_id, $phone)) {

            $success = TRUE;
            echo json_encode($success);

        }else{

            $success = FALSE;
            echo json_encode($success);

        }

    }
	
	public function test(){
		echo 'test';
	}
}