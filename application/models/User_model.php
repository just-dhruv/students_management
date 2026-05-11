<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function authenticate($username, $password)
    {

        $this->db->where('username', $username);
        $query = $this->db->get('users');

        $user = $query->row();
        // if ($query->num_rows() !== 1) {
        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            // return $this->load->view('pages/dashboard'); // NEVER SHOW PAGE LIKE THIS IN MODEL, ALWAY DO THIS IN CONTROLLER
            return $user;
        }

        return false;
    }
}
