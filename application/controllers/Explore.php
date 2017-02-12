<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index($parameter1, $parameter2)
    {

        if(isset($parameter1) && isset($parameter2)){
            $data['province'] = $parameter1;

            $data['season'] = $parameter2;

            $this->load->view('explore', $data);
        }else{
            $this->load->view('errors/html/error_404');
        }

    }

}