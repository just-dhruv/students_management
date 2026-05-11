<?php
defined('BASEPATH') OR exit("No direct script access allowed");

class Migration_create_users_table extends CI_Migration
{
    public function up(){
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '60',
                'null' => FALSE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            )
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_field("created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('username', FALSE, TRUE); // ('key_name', primary key, uniquie entry)
        $this->dbforge->create_table('users');
    }

    public function down(){
        $this->dbforge->drop_table('users', TRUE);
    }
}