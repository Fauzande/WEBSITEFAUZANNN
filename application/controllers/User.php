<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('jurusan_model');
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_users();
        $data['jurusan'] = $this->jurusan_model->get_jurusan(); 
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->user_model->get_users();
        $data['jurusan'] = $this->jurusan_model->get_jurusan(); 
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'), 
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'jurusan_id' => $this->input->post('jurusan_id'),
                'role' => $this->input->post('role')
            );

            $this->user_model->insert_user($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"> Data Berhasil Ditambahkan!</div>');
            redirect('user');
        }
    }

    public function edit($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id' => $id,
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'jurusan_id' => $this->input->post('jurusan_id'),
                'role' => $this->input->post('role')
            );

            $this->user_model->update_user($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"> Data Berhasil Diubah!</div>');
            redirect('user');
        }
    }

    public function delete($id)
    {
        $this->user_model->delete_user($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger"> Data Berhasil Dihapus!</div>');
        redirect('user');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jurusan_id', 'Jurusan', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
    }
}
