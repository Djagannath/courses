<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	public function index()
	{
	    if (!$this->session->has_userdata('login')) {
            $data['content'] = $this->load->view('login', [
                'title' => 'Login',
            ], true);

            $this->load->view('layout/template', $data);
        } else {
	        $login = $this->session->get_userdata('login');

            if ($login === ADMIN) {
                return redirect('/admin');
            } else {
                return redirect('/courses');
            }
        }
	}

	public function login($user)
    {
        $this->session->set_userdata('login', $user);

        if ($user == ADMIN) {
            return redirect('/admin');
        } else {
            return redirect('/courses');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login');

        return redirect('/');
    }
}
