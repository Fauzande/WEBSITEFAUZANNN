<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model'); // Pastikan model sudah dibuat
    }

    public function index() {
        if ($this->session->userdata('username')) {
            redirect('dashboard'); // Jika sudah login, redirect ke dashboard
        }
        $this->load->view('templates/csslogin');
        $this->load->view('login');
    }

    public function authenticate() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $role     = $this->input->post('role', TRUE);

        $user = $this->Login_model->get_user($username, $password, $role);

        if ($user) {
            $session_data = [
                'id'        => $user->id,
                'username'  => $user->username, // Pastikan nama sesuai dengan database
                'role'      => $user->role,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data);
            
            redirect('dashboard'); // Redirect ke halaman dashboard
        } else {
            $this->session->set_flashdata('error', 'Username, password, atau role salah!');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
