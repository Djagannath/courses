<?php

class BoughtModel extends CI_Model
{
    private $table = 'bought';

    public function bougthCouresesByUserId(int $userId): array
    {
        return $this->db->where('user_id', $userId)
                        ->get($this->table)
                        ->result();
    }

    public function bougth(int $courseId, int $userId): bool
    {
        if (!$this->hasBougth($courseId, $userId)) {
            return $this->db->insert($this->table,[
                'user_id' => $userId,
                'course_id' => $courseId,
            ]);
        }

        return false;
    }

    public function cancel(int $courseId, int $userId): bool
    {
        return $this->db->delete($this->table, [
                'user_id' => $userId,
                'course_id' => $courseId,
            ]) > 0;
    }

    public function hasBougth(int $courseId, int $userId): bool
    {
        $amount = $this->db->select('id')
            ->where('user_id', $userId)
            ->where('course_id', $courseId)
            ->get($this->table)->num_rows();

        return $amount > 0;
    }
}