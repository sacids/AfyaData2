<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_afyadata extends CI_Migration
{

    public function up()
    {
        // Drop table 'groups' if it exists
        $this->dbforge->drop_table('groups', TRUE);

        // Table structure for table 'groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('groups');

        // Dumping data for table 'groups'
        $data = array(
            array(
                'id' => '1',
                'name' => 'admin',
                'description' => 'Administrator of the project'
            ),
            array(
                'id' => '2',
                'name' => 'data_collector',
                'description' => 'Data collectors of project'
            )
        );
        $this->db->insert_batch('groups', $data);


        // Drop table 'users' if it exists
        $this->dbforge->drop_table('users', TRUE);

        // Table structure for table 'users'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '16'
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
            ),
            'salt' => array(
                'type' => 'VARCHAR',
                'constraint' => '40'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'activation_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'forgotten_password_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'forgotten_password_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'remember_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE
            ),
            'created_on' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'last_login' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'organization' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE
            )

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        // Dumping data for table 'users'
        $data = array(
            'id' => '1',
            'ip_address' => '127.0.0.1',
            'username' => 'administrator',
            'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
            'salt' => '',
            'email' => 'admin@admin.com',
            'activation_code' => '',
            'forgotten_password_code' => NULL,
            'created_on' => '1268889823',
            'last_login' => '1268889823',
            'active' => '1',
            'first_name' => 'Afyadata',
            'last_name' => 'Admin',
            'organization' => 'Sacids Tanzania',
            'phone' => '+255 232 640 037',
        );
        $this->db->insert('users', $data);


        // Drop table 'users_groups' if it exists
        $this->dbforge->drop_table('users_groups', TRUE);

        // Table structure for table 'users_groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            ),
            'group_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users_groups');

        // Dumping data for table 'users_groups'
        $data = array(
            array(
                'id' => '1',
                'user_id' => '1',
                'group_id' => '1',
            ),
            array(
                'id' => '2',
                'user_id' => '1',
                'group_id' => '2',
            )
        );
        $this->db->insert_batch('users_groups', $data);


        // Drop table 'login_attempts' if it exists
        $this->dbforge->drop_table('login_attempts', TRUE);

        // Table structure for table 'login_attempts'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '16'
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('login_attempts');


        // Drop table 'access_module' if it exists
        $this->dbforge->drop_table('access_module', TRUE);

        // Table structure for table 'access_module'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'controller' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('access_module');

        // Drop table 'access_function' if it exists
        $this->dbforge->drop_table('access_function', TRUE);

        // Table structure for table 'access_function'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'module_id' => array(
                'type' => 'INT',
                'constraint' => '11'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('access_function');


        // Drop table 'access_group' if it exists
        $this->dbforge->drop_table('access_group', TRUE);

        // Table structure for table 'access_group'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'group_id' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'function_id' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'table_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'table_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('access_group');


        // Drop table 'access_user' if it exists
        $this->dbforge->drop_table('access_user', TRUE);

        // Table structure for table 'access_user'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'function_id' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'table_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'table_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('access_user');


        // Drop table 'project' if it exists
        $this->dbforge->drop_table('project', TRUE);

        // Table structure for table 'project'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'description' => array(
                'type' => 'TEXT'
            ),
            'created_at' => array(
                'type' => 'DATETIME'
            ),
            'owner' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'definition' => array(
                'type' => 'TEXT'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('project');


        // Drop table 'forms' if it exists
        $this->dbforge->drop_table('forms', TRUE);

        // Table structure for table 'forms'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'description' => array(
                'type' => 'TEXT'
            ),
            'project_id' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'access' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => 'public' //public, private
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => 'published' //published,unpublished,deleted,archived
            ),
            'created_at' => array(
                'type' => 'DATETIME'
            ),
            'owner' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'created_by' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'definition' => array(
                'type' => 'TEXT'
            ),
            'perms' => array(
                'type' => 'TEXT'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('forms');


        // Drop table 'campaign' if it exists
        $this->dbforge->drop_table('campaign', TRUE);

        // Table structure for table 'campaign'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'description' => array(
                'type' => 'TEXT'
            ),
            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'form_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => 'published' //published,unpublished
            ),
            'created_at' => array(
                'type' => 'DATETIME'
            ),
            'created_by' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'definition' => array(
                'type' => 'TEXT'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('campaign');

        // Drop table 'form_archive' if it exists
        $this->dbforge->drop_table('form_archive', TRUE);

        // Table structure for table 'form_archive'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'form_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'deleted_at' => array(
                'type' => 'DATETIME'
            ),
            'deleted_by' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'new_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('form_archive');

    }

    public function down()
    {
        $this->dbforge->drop_table('users', TRUE);
        $this->dbforge->drop_table('groups', TRUE);
        $this->dbforge->drop_table('users_groups', TRUE);
        $this->dbforge->drop_table('login_attempts', TRUE);
        $this->dbforge->drop_table('access_module', TRUE);
        $this->dbforge->drop_table('access_function', TRUE);
        $this->dbforge->drop_table('access_group', TRUE);
        $this->dbforge->drop_table('access_user', TRUE);
        $this->dbforge->drop_table('project', TRUE);
        $this->dbforge->drop_table('forms', TRUE);
        $this->dbforge->drop_table('campaign', TRUE);
        $this->dbforge->drop_table('form_archive', TRUE);
    }
}
