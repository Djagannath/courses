<?php

class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('login') ||
            $this->session->get_userdata('login')['login'] != USER) {
            return redirect('/');
        }

        $this->load->model('courseModel', 'model');
    }

    public function index()
    {
        $data['content'] = $this->load->view('site', [
            'title' => 'Course list',
        ], true);

        $this->load->view('layout/template', $data);
    }
}