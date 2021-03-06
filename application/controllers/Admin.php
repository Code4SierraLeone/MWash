<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library(array('session'));
        $this->load->library('recaptcha');
        $this->load->model('admin_model');
    }

    public function register() {

        // create the data object
        $data = new stdClass();

        $data->title = 'Register';

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
            $this->load->view('header', $data);
            $this->load->view('register/register');
            $this->load->view('footer');

        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $password = $this->input->post('password');
            $captcha_answer = $this->input->post('g-recaptcha-response');

            $captchaResponse = $this->recaptcha->verifyResponse($captcha_answer);

            if ($captchaResponse['success'] == TRUE) {

				$authkey = $this->generate_authkey($password);

                $authResponse = $this->admin_model->create_user($authkey, $username, $email, $password);

                if($authResponse == TRUE){
                    // user creation ok
                    redirect('/login');
                }

            } else {

                // user creation failed, this should never happen
                $data->error = 'There was a problem creating your new account. Please try again.';

                // send error to the view
                $this->load->view('header', $data);
                $this->load->view('register/register', $data);
                $this->load->view('footer');

            }

        }

    }

    public function login()
    {
        // create the data object
        $data = new stdClass();

        $data->title = 'Login';

        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {

            // validation not ok, send validation errors to the view
            $this->load->view('header', $data);
            $this->load->view('login/login');
            $this->load->view('footer');

        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $captcha_answer = $this->input->post('g-recaptcha-response');

            $authResponse = $this->admin_model->resolve_user_login($username, $password);
            $captchaResponse = $this->recaptcha->verifyResponse($captcha_answer);
            $verifyauthkey = $this->admin_model->verify_authkey($username);

            if ($authResponse == TRUE && $captchaResponse['success'] == TRUE) {

				$user_id = $this->admin_model->get_user_id_from_username($username);

				if($verifyauthkey == null){ //applies to existing

					$authkey = $this->generate_authkey($password);

					$this->admin_model->add_authkey($user_id, $authkey);

				}

				$user = $this->admin_model->get_user($user_id);

                // set session user datas
                $_SESSION['user_auth']      = (string)$user->auth;
                $_SESSION['username']     = (string)$user->username;
                $_SESSION['email']     = (string)$user->email;
                $_SESSION['logged_in']    = (bool)true;
                $_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
                $_SESSION['is_admin']     = (bool)$user->is_admin;

                // user login ok
                redirect('/dash');

            } else {

                // login failed
                $data->error = 'Wrong username or password.';

                // send error to the view
                $this->load->view('header', $data);
                $this->load->view('login/login', $data);
                $this->load->view('footer');

            }

        }
    }

    public function forgotpassword(){

        // create the data object
        $data = new stdClass();

        $data->title = 'Forgot Password';

        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // set validation rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {

            // validation not ok, send validation errors to the view
            $this->load->view('header',$data);
            $this->load->view('forgotpassword/forgotpassword');
            $this->load->view('footer');

        } else {

            // set variables from the form
            $email = $this->input->post('email');

            if ($this->admin_model->resolve_email($email)) {

                $data->verified = 'The system admin will send you link to your email with an hour. Click <a href="'.base_url().'">Here</a>';

                // send error to the view
                $this->load->view('header', $data);
                $this->load->view('forgotpassword/forgotpassword', $data);
                $this->load->view('footer');

            } else {

                // login failed
                $data->error = 'Invalid Email.';

                // send error to the view
                $this->load->view('header', $data);
                $this->load->view('forgotpassword/forgotpassword', $data);
                $this->load->view('footer');

            }

        }
    }

    public function dash()
    {
        if(isset($_SESSION['user_auth']) && isset($_SESSION['username']) && isset($_SESSION['logged_in'])) {

            $data['username'] = $_SESSION['username'];
            $data['email'] = $_SESSION['email'];
            $data['page'] = 'dash';


            $this->load->view('dashboard/header', $data);
            $this->load->view('dash_summary');
            $this->load->view('dashboard/footer');

        } else {

            redirect('/login');

        }
    }

    public function newpoint(){

        if(isset($_SESSION['user_auth']) && isset($_SESSION['username']) && isset($_SESSION['logged_in'])) {

            $data['username'] = $_SESSION['username'];
            $data['email'] = $_SESSION['email'];
            $data['page'] = 'newpoint';

            $this->load->view('dashboard/header', $data);
            $this->load->view('dash_addnewpoint');
            $this->load->view('dashboard/footer');

        } else {

            redirect('/login');

        }
    }

    public function dash_users() {

        if(isset($_SESSION['user_auth']) && isset($_SESSION['username']) && isset($_SESSION['logged_in'])) {

            $data['username'] = $_SESSION['username'];
            $data['email'] = $_SESSION['email'];
            $data['userauth'] = $_SESSION['user_auth'];
            $data['page'] = 'users';

            $data['users'] = $this->admin_model->get_unapproved_users();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dash_users', $data);
            $this->load->view('dashboard/footer');

        } else {

            redirect('/login');

        }

    }

    public function update_user_info() {

        if(isset($_SESSION['user_auth']) && isset($_SESSION['username']) && isset($_SESSION['logged_in'])){

            if(isset($_POST['new_email'])) {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('new_email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

                $newemail = $this->input->post('new_email');

                if($this->form_validation->run() == TRUE) {

                    $userauth = $_SESSION['user_auth'];

                    if($this->admin_model->update_user_email($userauth, $newemail)){

                        $response = array('resp'=>'1');

                        echo json_encode($response);

                    }

                }else{

                    $response = strip_tags(validation_errors());

                    echo json_encode($response);
                }

            } else if(isset($_POST['new_password'])) {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('new_password', 'Password', 'trim|required|min_length[6]');

                $newpassword = $this->input->post('new_password');

                if($this->form_validation->run() == TRUE) {

                    $userauth = $_SESSION['user_auth'];

                    if($this->admin_model->update_user_password($userauth, $newpassword)) {

                        $response = array('resp'=>'1');

                        echo json_encode($response);

                    }

                } else {

                    $response = strip_tags(validation_errors());

                    echo json_encode($response);
                }

            }else if(isset($_POST['new_username'])) {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('new_username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));

                $newusername = $this->input->post('new_username');

                if($this->form_validation->run() == TRUE) {

                    $userauth = $_SESSION['user_auth'];

                    if($this->admin_model->update_user_username($userauth, $newusername)) {

                        $response = array('resp'=>'1');

                        echo json_encode($response);

                    }

                } else {

                    $response = strip_tags(validation_errors());

                    echo json_encode($response);
                }

            }

        } else {

            $response = array('resp'=>'User Session Has Ended Please Login Again');

            echo json_encode($response);

        }

    }

	public function generate_authkey($password){

		$timestamp = date("YmdHis",time());
		$authkey = base64_encode(hash("sha256", $password.$timestamp));

		return $authkey;
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
