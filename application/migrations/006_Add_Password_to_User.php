<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Password_to_User extends CI_Migration
{

    public function up()
    {
        $fields = (array(
            'u_pass' => array(
                'type' => 'VARCHAR',
                'constraint' => '128'
            )
        ));
        $this->dbforge->add_column('t_user', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('t_user', 'u_pass');
    }
}