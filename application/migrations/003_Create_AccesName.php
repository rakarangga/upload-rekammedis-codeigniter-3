<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_Create_AccesName extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'an_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unsigned' => TRUE,
            ),
            'an_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'tgl_posting' => array(
                'type' => 'DATETIME'
            ),
            'tgl_update' => array(
                'type' => 'DATETIME'
            ),
        ));
        $this->dbforge->add_key('an_id', TRUE);
        $this->dbforge->create_table('t_acs_nm');
    }

    public function down()
    {
        $this->dbforge->drop_table('t_acs_nm');
    }
}