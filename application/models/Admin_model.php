<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    /**
     * create_user function.
     *
     * @access public
     * @param mixed $username
     * @param mixed $email
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function create_user($username, $email, $password) {

        $data = array(
            'username'   => $username,
            'email'      => $email,
            'password'   => $this->hash_password($password),
            'created_at' => date('Y-m-j H:i:s'),
        );

        return $this->db->insert('users', $data);

    }

    /**
     * resolve_user_login function.
     *
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function resolve_user_login($username, $password) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password !=', '0');
        $this->db->where('is_confirmed', '1');
        $this->db->where('is_deleted', '0');
        $this->db->where('password_reset', '0');
        $hash = $this->db->get()->row('password');

        return $this->verify_password_hash($password, $hash);

    }

    /**
     * resolve_email function.
     *
     * @access public
     * @param mixed $email
     * @return string|bool could be a string on success, or bool false on failure
     */
    public function resolve_email($email) {

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('email', $email);
        $userid = $this->db->get()->row('id');

        return $this->password_reset_request($userid);

    }

    /**
     * password_reset_request function.
     *
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool
     */
    public function password_reset_request($userid) {

        $this->db->set('password', '0');
        $this->db->set('password_reset', '1');
        $this->db->set('updated_at', date('Y-m-j H:i:s'));
        $this->db->where('id', $userid);

        return $this->db->update('users');
    }

    /**
     * update_user_email function.
     *
     * @access public
     * @param mixed $userid
     * @param mixed $email
     * @return bool
     */
    public function update_user_email($userid, $email) {

        $this->db->set('email', $email);
        $this->db->where('id', $userid);

        return $this->db->update('users');
    }

    /**
     * get_user_id_from_username function.
     *
     * @access public
     * @param mixed $username
     * @return int the user id
     */
    public function get_user_id_from_username($username) {

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username', $username);

        return $this->db->get()->row('id');

    }

    /**
     * get_user function.
     *
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function get_user($user_id) {

        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get()->row();

    }

    /**
     * hash_password function.
     *
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password) {

        return password_hash($password, PASSWORD_BCRYPT);

    }

    /**
     * verify_password_hash function.
     *
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {

        return password_verify($password, $hash);

    }

}