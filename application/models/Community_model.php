<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function contribution($waterpointid, $column, $condition) {

        $data = array(
            'water_point_id'   => $waterpointid,
            'attribute'      => $column,
            'condition'      => $condition,
            'created_at' => date('Y-m-j H:i:s'),
        );

        return $this->db->insert('community_updates', $data);

    }

    public function get_update_number(){

        $query = $this->db->query('SELECT * FROM community_updates');

        return $query->num_rows();
    }

}