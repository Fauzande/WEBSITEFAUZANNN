<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model'); 
    }

    public function index()
    {
        $data['jurusan'] = $this->Jurusan_model->get_jurusan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jurusan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_jurusan');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'code_jurusan' => $this->input->post('code_jurusan'),
            );

            $this->Jurusan_model->insert_data($data, 'jurusan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Ditambahkan!</div>');
            redirect('jurusan');
        }
    }

    public function edit($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'code_jurusan' => $this->input->post('code_jurusan'),
            );

            $this->Jurusan_model->update_jurusan($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Data Berhasil Diubah!</div>');
            redirect('jurusan');
        }
    }

    public function delete($id)
    {
        $this->Jurusan_model->delete_jurusan($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Berhasil Dihapus!</div>');
        redirect('jurusan');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required', array(
            'required' => '%s harus diisi!'
        ));

        $this->form_validation->set_rules('code_jurusan', 'Kode Jurusan', 'required', array(
            'required' => '%s harus diisi!'
        ));
    }
    public function print(){
        $data['jurusan'] = $this->Jurusan_model->get_jurusan(); 
        $this->load->view('jurusan_print', $data);
    }
}
