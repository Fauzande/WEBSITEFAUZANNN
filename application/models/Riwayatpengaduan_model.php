<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatPengaduan_model extends CI_Model {

    public function get_riwayat_pengaduan()
    {
        $this->db->select('riwayat_pengaduan.*, 
                   users.username as username, 
                   pengaduan.judul as judul');
        $this->db->from('riwayat_pengaduan');
        $this->db->join('users', 'users.id = riwayat_pengaduan.user_id', 'left'); 
        $this->db->join('pengaduan', 'pengaduan.id = riwayat_pengaduan.pengaduan_id', 'left'); 
        return $this->db->get()->result();
    }

    public function insert_riwayat($data)
    {
        return $this->db->insert('riwayat_pengaduan', $data);
    }

    public function get_by_id($id)
    {
        if (!$id) {
            return null;
        }
        return $this->db->get_where('riwayat_pengaduan', ['id' => $id]);
    }

    public function update_data($data)
    {
        if (!isset($data['id'])) {
            return false;
        }
        $this->db->where('id', $data['id']);
        return $this->db->update('riwayat_pengaduan', $data);
    }

    public function delete($id)
    {
        if (!$id) {
            return false;
        }
        return $this->db->delete('riwayat_pengaduan', ['id' => $id]);
    }
    public function total_all_riwayatpengaduan() {
        return $this->db->count_all('riwayat_pengaduan'); 
    }
}
