<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
		public function index() {
			$this->load->model('User_model');
			$this->load->model('pengaduan_model');
			$this->load->model('Jurusan_model');
			$this->load->model('riwayatpengaduan_model');
			

			$data['total_users'] = $this->User_model->total_all_users();
			$data['total_pengaduan'] = $this->pengaduan_model->total_all_pengaduan();
			$data['total_jurusan'] = $this->Jurusan_model->total_all_jurusan();
			$data['total_riwayatpengaduan'] = $this->riwayatpengaduan_model->total_all_riwayatpengaduan();
			
			
			$this->load->view('templates/footer');
			$this->load->view('templates/header');
			$this->load->view('dashboard', $data);
			$this->load->view('templates/sidebar');
		}
	}
		
