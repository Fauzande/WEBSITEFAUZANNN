<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatPengaduan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Pengaduan_model');
        $this->load->model('RiwayatPengaduan_model');
    }

    public function index()
    {
        $data['riwayat_pengaduan'] = $this->RiwayatPengaduan_model->get_riwayat_pengaduan();
        $data['users'] = $this->User_model->get_users();  
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan(); 
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('riwayatpengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['users'] = $this->User_model->get_users(); 
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan(); 
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_riwayat_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'pengaduan_id' => $this->input->post('pengaduan_id'),
                'user_id' => $this->input->post('user_id'),
                'status' => $this->input->post('status'),
                'catatan' => $this->input->post('catatan'),
                'tanggal' => date('Y-m-d H:i:s')
            ];

            $this->RiwayatPengaduan_model->insert_riwayat($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Ditambahkan!</div>');
            redirect('RiwayatPengaduan');
        }
    }

    public function edit($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Validasi gagal, periksa kembali!</div>');
        } else {
            $data = [
                'id' => $id,
                'status' => $this->input->post('status'),
                'catatan' => $this->input->post('catatan'),
                'tanggal' => date('Y-m-d H:i:s')
            ];
    
            $this->RiwayatPengaduan_model->update_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Berhasil Diubah!</div>');
        }

        redirect('RiwayatPengaduan');  
    }

    public function delete($id)
    {
        $this->RiwayatPengaduan_model->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Berhasil Dihapus!</div>');
        redirect('RiwayatPengaduan');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('status', 'Status', 'required');
    }
}
