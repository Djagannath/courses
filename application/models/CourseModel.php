<?php

class CourseModel extends CI_Model
{
    private $table = 'courses';

    public function getAll(): array
    {
        return $this->db->select('id, title, start')
                        ->order_by('start')
                        ->get($this->table)
                        ->result();
    }

    public function get(int $id)
    {
        return $this->db->select('id, title, start')
                        ->where('id', $id)
                        ->get($this->table)
                        ->row();
    }

    public function create(array $params): bool
    {
        return $this->db->insert($this->table, $params);
    }

    public function update(int $id, array $data): bool
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete(int $id): bool
    {
        return $this->db->delete($this->table, ['id' => $id]) > 0;
    }
}

