<?php


class Migration_Create_Courses_Table extends CI_Migration
{
    private $table = 'courses';

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'start' => [
                'type' => 'date',
            ],
        ]);
        $this->dbforge->add_key('id');
        $this->dbforge->create_table($this->table);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->table);
    }
}