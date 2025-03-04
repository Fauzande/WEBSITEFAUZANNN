<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('pengaduan_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pengaduan'] = $this->pengaduan_model->get_pengaduan();
        $data['users'] = $this->user_model->get_users();  

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['pengaduan'] = $this->pengaduan_model->get_pengaduan();
        $data['users'] = $this->user_model->get_users(); 

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $config['upload_path']   = 'asset/Foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; 
            $config['file_name']     = time() . '_' . $_FILES['Foto']['name'];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('Foto')) {
                $uploadData = $this->upload->data();
                $Foto = $uploadData['file_name']; 
            } else {
                $Foto = ''; 
            }

            $data = array(
                'judul' => $this->input->post('judul'),
                'Foto' => $Foto,
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_diajukan' => $this->input->post('tanggal_diajukan'),
                'total_pengguna' => $this->input->post('total_pengguna'),
                'user_id' => $this->input->post('user_id'),
            );

            $this->pengaduan_model->insert_pengaduan($data, 'pengaduan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan! 
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>');
            redirect('pengaduan');
        }
    }
    public function edit($id)
    {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $data['pengaduan'] = $this->pengaduan_model->get_by_id($id)->row();
            $data['users'] = $this->user_model->get_users();
    
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('edit_pengaduan', $data);
            $this->load->view('templates/footer');
        } else {
            // Konfigurasi upload foto
            $config['upload_path']   = 'asset/Foto/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; 
            $config['file_name']     = time() . '_' . $_FILES['Foto']['name'];
    
            $this->upload->initialize($config);
            $Foto = $this->input->post('Foto_lama'); 
    
            if (!empty($_FILES['Foto']['name'])) { 
                if ($this->upload->do_upload('Foto')) {
                    $uploadData = $this->upload->data();
                    $Foto = $uploadData['file_name'];
    
                 
                    $fotoLama = $this->input->post('Foto_lama');
                    if (!empty($fotoLama) && file_exists('asset/Foto/' . $fotoLama)) {
                        unlink('asset/Foto/' . $fotoLama);
                    }
                } else {
                    echo "Error upload: " . $this->upload->display_errors(); 
                    exit; 
                }
            }
    
            $data = array(
                'id' => $id,
                'judul' => $this->input->post('judul'),
                'Foto' => $Foto,
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_diajukan' => $this->input->post('tanggal_diajukan'),
                'total_pengguna' => $this->input->post('total_pengguna'),
                'user_id' => $this->input->post('user_id'),
            );
    
            $this->pengaduan_model->update_data($data, 'pengaduan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah! 
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>');
            redirect('pengaduan');
        }
    }
    

    public function delete($id)
    {
        $pengaduan = $this->pengaduan_model->get_by_id($id)->row();
        $Foto_lama = $pengaduan->Foto;

        if (!empty($Foto_lama) && file_exists('asset/Foto/' . $Foto_lama)) {
            unlink('asset/Foto/' . $Foto_lama);
        }

        $where = array('id' => $id);
        $this->pengaduan_model->delete($where, 'pengaduan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus! 
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>');
        redirect('pengaduan');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal_diajukan', 'Tanggal Diajukan', 'required');
        $this->form_validation->set_rules('total_pengguna', 'Total Pengguna', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
    }
}