<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
    public function get_all_students()
    {
        $query = $this->db->select('*')
            ->from('students')
            ->get();

        return $query->result();
    }

    public function store_student($data)
    {
        return $this->db->insert('students', $data);
    }

    public function get_student($id)
    {
        $query = $this->db->get_where('students', ['id' => $id])->row();

        return $query;
    }

    public function update_student($id, $data)
    {
        $query = $this->db->where('id', $id)->update('students', $data);
        return $query;
    }

    public function delete_student($id){
        return $this->db->delete('students', ['id' => $id]);
    }
}
