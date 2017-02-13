<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library(array('session'));
        //$this->load->helper(array('url'));
        $this->load->model('admin_model');
    }

    public function register() {

        // create the data object
        $data = new stdClass();

        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');

        if ($this->form_validation->run() === false) {

            // validation not ok, send validation errors to the view
            $this->load->view('header');
            $this->load->view('register/register');
            $this->load->view('footer');

        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->admin_model->create_user($username, $email, $password)) {

                // user creation ok
                redirect('/login');

            } else {

                // user creation failed, this should never happen
                $data->error = 'There was a problem creating your new account. Please try again.';

                // send error to the view
                $this->load->view('header');
                $this->load->view('register/register', $data);
                $this->load->view('footer');

            }

        }

    }

    public function login()
    {
        // create the data object
        $data = new stdClass();

        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {

            // validation not ok, send validation errors to the view
            $this->load->view('header');
            $this->load->view('login/login');
            $this->load->view('footer');

        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->admin_model->resolve_user_login($username, $password)) {

                $user_id = $this->admin_model->get_user_id_from_username($username);
                $user    = $this->admin_model->get_user($user_id);

                // set session user datas
                $_SESSION['user_id']      = (int)$user->id;
                $_SESSION['username']     = (string)$user->username;
                $_SESSION['logged_in']    = (bool)true;
                $_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
                $_SESSION['is_admin']     = (bool)$user->is_admin;

                // user login ok
                redirect('/dash');

            } else {

                // login failed
                $data->error = 'Wrong username or password.';

                // send error to the view
                $this->load->view('header');
                $this->load->view('login/login', $data);
                $this->load->view('footer');

            }

        }
    }

    public function dash()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['logged_in'])){
            $this->load->view('dashboard');
        }else{
            redirect('/login');
        }
    }

    public function logout() {

        // create the data object
        $data = new stdClass();

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }

            // user logout ok
            redirect('/login');

        } else {

            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('/login');

        }

    }

}