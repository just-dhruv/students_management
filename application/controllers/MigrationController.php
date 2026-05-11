<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MigrationController extends CI_Controller
{
    public function migrate()
    {
        $this->load->library('migration');

        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migrations executed successfully.';
        }
    }

    public function insert_user()
    {

        $pw1 = password_hash('12345678', PASSWORD_DEFAULT);
        $pw2 = password_hash('12345678', PASSWORD_DEFAULT);

        $data = [
            ['username' => 'admin', 'password' => $pw1 ],
            ['username' => 'user', 'password' => $pw2 ]
        ];

        $this->db->insert_batch('users', $data);
        echo 'Users added.';
    }

    public function insert_student()
    {
        $data = [
            ['full_name' => 'Dhruv D', 'email' => 'dhruv@test.co', 'phone' => '1234567898', 'course' => 'BE'],
            ['full_name' => 'Rahul Patel', 'email' => 'rahul@test.co', 'phone' => '1234567898', 'course' => 'BCA']
        ];
        $this->db->insert_batch('students', $data);
        echo 'Students added.';
    }
}
