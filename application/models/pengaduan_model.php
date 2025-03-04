<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{
    public function get_pengaduan()
    {
        $this->db->select('pengaduan.*, users.username as username');
        $this->db->from('pengaduan');
        $this->db->join('users', 'users.id = pengaduan.user_id', 'left'); 
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('pengaduan', array('id' => $id));
    }

    public function insert_pengaduan($data)
    {
        return $this->db->insert('pengaduan', $data);
    }

    public function update_data($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('pengaduan', $data);
    }

    public function delete($where)
    {
        return $this->db->delete('pengaduan', $where);
    }
    public function total_all_pengaduan() {
        return $this->db->count_all('pengaduan'); 
    }
}
