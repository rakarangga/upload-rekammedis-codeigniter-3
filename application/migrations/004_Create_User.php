<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_Create_User extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'u_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unsigned' => TRUE,
            ),
            'u_an_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unsigned' => TRUE,
            ),
            'u_name_l' => array(
                'type' => 'VARCHAR',
                'constraint' => 60
            ),   
            'u_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'stts' => array(
                'type' => 'enum("Y","T")',
                'default' => 'Y'
            ),
            'tgl_posting' => array(
                'type' => 'DATETIME'
            ),
            'tgl_update' => array(
                'type' => 'DATETIME'
            ),
        ));
        $this->dbforge->add_key('u_id', TRUE);
        $this->dbforge->create_table('t_user');
    }

    public function down()
    {
        $this->dbforge->drop_table('t_user');
    }
}