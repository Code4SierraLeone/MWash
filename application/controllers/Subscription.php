<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library(array('session'));
        $this->load->model('subscribers_model');
    }

    public function add_subscriber_one(){

        $data =array(
            'province' => $this->input->post('prov_id'),
            'district' => $this->input->post('dist_id'),
            'chiefdom' => $this->input->post('chief_id'),
            'phone_number' => $this->input->post('phone'),
            'created_at' => date('Y-m-j H:i:s')
        );

        $data = $this->security->xss_clean($data);

        if ($this->subscribers_model->create_subscriber_one($data)) {

            $resp = 1;
            echo json_encode($resp);

        }else{

            $resp = 0;
            echo json_encode($resp);

        }

    }

    public function add_subscriber_two(){

        $data = array(
            'water_point_id' => $this->input->post('waterp_id'),
            'phone_number' => $this->input->post('phone'),
            'created_at' => date('Y-m-j H:i:s')
        );

        $data = $this->security->xss_clean($data);

        if ($this->subscribers_model->create_subscriber_two($data)) {

            $resp = 1;
            echo json_encode($resp);

        }else{

            $resp = 0;
            echo json_encode($resp);

        }

    }

    public function get_subscribers(){

        if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['logged_in'])) {

            $subno = $this->subscribers_model->get_subscribers_number();

            echo json_encode($subno);

        }

    }
}