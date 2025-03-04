<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function get_user($username, $password, $role) {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Hashing lebih aman
        $this->db->where('role', $role);
        return $this->db->get('users')->row();
    }
}
