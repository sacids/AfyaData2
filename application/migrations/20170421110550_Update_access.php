<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: renfrid
 * Date: 4/21/17
 * Time: 11:05 AM
 */
class Migration_Update_access extends CI_Migration
{
    public function up()
    {
        //add column sms_code
        $sms_code_field = array(
            'sms_code' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
            )
        );
        $this->dbforge->add_column('users', $sms_code_field);

        //modify column table_id in access_group table
        $group_table_id_field = array(
            'table_id' => array(
                'name' => 'filter',
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
        );
        $this->dbforge->modify_column('access_group', $group_table_id_field);

        //modify column table_id in access_user table
        $user_table_id_field = array(
            'table_id' => array(
                'name' => 'filter',
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
        );
        $this->dbforge->modify_column('access_user', $user_table_id_field);
    }

    function down()
    {
        $this->dbforge->drop_column("access_group", "function_id");
        $this->dbforge->drop_column("access_group", "slug");
        $this->dbforge->drop_column("access_user", "function_id");
        $this->dbforge->drop_column("access_user", "slug");
    }
}
