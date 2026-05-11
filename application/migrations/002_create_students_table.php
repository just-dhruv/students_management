<?php
defined('BASEPATH') OR exit("No direct script access allowed");

class Migration_create_students_table extends CI_Migration
{
    public function up(){

        $fields = array(
            'id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => TRUE,
                'unsigned' => TRUE,
            ],
            'full_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'course' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ],
            // 'created_at' => [
            //     'type' => 'TIMESTAMP',
            //     'null' => FALSE,
            // ]
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_field('created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        // $this->dbforge->add_key('email', FALSE, TRUE);
        $this->dbforge->create_table('students');
    }

    public function down(){
        $this->dbforge->drop_table('students', TRUE);
    }
}