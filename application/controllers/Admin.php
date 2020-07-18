<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('login') ||
            $this->session->get_userdata('login')['login'] != ADMIN) {
            return redirect('/');
        }

        $this->load->model('courseModel', 'model');
    }

    public function index()
    {
        $data['content'] = $this->load->view('admin', [
            'title' => 'Admin panel',
            'courses' => $this->model->getAll(),
        ], true);

        $this->load->view('layout/template', $data);
    }

    public function create()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('start', 'Start', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $data = $this->input->post();

            if ($this->model->create($data)) {
                return redirect('/admin');
            }
        }

        $data['content'] = $this->load->view('form', [
            'title' => 'Create course',
        ], true);

        $this->load->view('layout/template', $data);
    }

    public function edit($id)
    {
        $model = $this->model->get($id);

        if (empty($model)) {
            show_404();
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('start', 'Start', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $data = $this->input->post();

            if ($this->model->update($id, $data) > 0) {
                return redirect('/admin');
            }
        }

        $data['content'] = $this->load->view('form', [
            'title' => 'Update course',
            'model' => $model,
        ], true);

        $this->load->view('layout/template', $data);
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            $this->session->set_flashdata('success', 'Deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Can`t delete');
        }

        return redirect('/admin');
    }
}