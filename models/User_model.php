<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    private $table = 'user';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function list() {
    }

    public function getByEmail($email) {
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);
        if ( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function create() {
    }

    public function update() {
    }

    public function delete() {
    }
}