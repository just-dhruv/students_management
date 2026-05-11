<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
    public function get_students()
    {
        $query = $this->db->select('*')
            ->from('students')
            ->get();

        return $query->result();
    }
}
