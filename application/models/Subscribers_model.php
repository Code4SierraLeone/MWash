<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function create_subscriber_one($data) {

        return $this->db->insert('subscribers', $data);

    }

    public function create_subscriber_two($data) {

        return $this->db->insert('subscribers', $data);

    }

    public function get_subscribers_number(){

        $query = $this->db->query('SELECT * FROM subscribers');

        return $query->num_rows();
    }
}