<?php


class Migration_Create_Bought_Table extends CI_Migration
{
    private $table = 'bought';

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'int',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'course_id' => [
                'type' => 'int',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'created_at datetime default current_timestamp',
        ]);

        $this->dbforge->add_key('id');
        $this->dbforge->add_key('user_id', true);
        $this->dbforge->add_key('course_id', true);

        $this->dbforge->create_table($this->table);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->table);
    }
}