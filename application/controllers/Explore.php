<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index($param1, $param2, $param3, $param4)
    {

        if(isset($param1) && isset($param2) && isset($param3) && isset($param4)){

            $data['province'] = $param1;

            $data['season'] = $param2;

            $data['functionality'] = $param3;

            $data['mechanic'] = $param4;

            $this->load->view('explore', $data);
        }else{
            $this->load->view('errors/html/error_404');
        }

    }

}