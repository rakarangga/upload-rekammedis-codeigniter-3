<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_Create_Module extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'mod_modulegroupid' => array(
                'type' => 'VARCHAR',
                'constraint' => 25,
                'unsigned' => TRUE,
                
            ),
            'mod_modulegroupname' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'mod_moduleid' => array(
                'type' => 'VARCHAR',
                'constraint' => 25,
                'unique' => TRUE,
                'unsigned' => TRUE
            ),
            'mod_modulename' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'mod_modulegrouporder' => array(
                'type' => 'INT',
                'constraint' => 3
            ),
            'mod_moduleorder' => array(
                'type' => 'INT',
                'constraint' => 3
            ),
            'mod_modulepagename' => array(
                'type' => 'VARCHAR',
               'constraint' => 255
            ),
            'tgl_posting' => array(
                'type' => 'DATETIME'
            ),
            'tgl_update' => array(
                'type' => 'DATETIME'
            ),
        ));
        $this->dbforge->add_key('mod_modulegroupid', TRUE);
        $this->dbforge->add_key('mod_moduleid', TRUE);
        $this->dbforge->create_table('t_module');
    }

    public function down()
    {
        $this->dbforge->drop_table('t_module');
    }
}