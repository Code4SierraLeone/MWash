<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers_model extends CI_Model {

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

    public function create_subscriber_one($province, $district, $chiefdom, $phone) {

        $data = array(
            'province'   => $province,
            'district'      => $district,
            'chiefdom'   => $chiefdom,
            'phone_number'   => $phone,
            'created_at' => date('Y-m-j H:i:s'),
        );

        return $this->db->insert('subscribers', $data);

    }

    public function create_subscriber_two($waterpoint_id, $phone) {

        $data = array(
            'water_point_id'   => $waterpoint_id,
            'phone_number'   => $phone,
            'created_at' => date('Y-m-j H:i:s'),
        );

        return $this->db->insert('subscribers', $data);

    }
}