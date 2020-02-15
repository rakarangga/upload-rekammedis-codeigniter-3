<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_Create_AccesControl extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'ac_an_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unsigned' => TRUE,
            ),
            'ac_module_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 25,
                'unsigned' => TRUE,
            ),
            'ac_create' => array(
               'type' => 'enum("Y","T")',
                'default' => 'T'
            ),   
            'ac_edit' => array(
               'type' => 'enum("Y","T")',
                'default' => 'T'
            ),
            'ac_delete' => array(
                'type' => 'enum("Y","T")',
                'default' => 'T'
            ),
            'ac_view' => array(
                'type' => 'enum("Y","T")',
                'default' => 'T'
            ),
            'tgl_posting' => array(
                'type' => 'DATETIME'
            ),
            'tgl_update' => array(
                'type' => 'DATETIME'
            ),
        ));
        $this->dbforge->add_key('ac_an_id', TRUE);
        $this->dbforge->add_key('ac_module_id', TRUE);
        $this->dbforge->create_table('t_acs_ctrl');
    }

    public function down()
    {
        $this->dbforge->drop_table('t_acs_ctrl');
    }
}