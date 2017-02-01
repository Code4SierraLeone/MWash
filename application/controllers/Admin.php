<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function dash()
    {
        $this->load->view('dashboard');
    }

}