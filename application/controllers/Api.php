<?php

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('courseModel');
        $this->load->model('boughtModel');
    }

    public function list()
    {
        $this->output->set_content_type('application/json')
                     ->set_output(
                         json_encode(
                             $this->courseModel->getAll()
                         )
                     );
    }

    public function boughtCourses($userId)
    {
        $this->output->set_content_type('application/json')
            ->set_output(
                json_encode(
                    $this->boughtModel->bougthCouresesByUserId($userId)
                )
            );
    }

    public function buy($courseId)
    {
        $this->output->set_content_type('application/json')
            ->set_output(
                json_encode(
                    $this->boughtModel->bougth($courseId, 1)
                )
            );
    }

    public function cancel($courseId)
    {
        $this->output->set_content_type('application/json')
            ->set_output(
                json_encode(
                    $this->boughtModel->cancel($courseId, 1)
                )
            );
    }
}