<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {

    public function get_jurusan()
    {
        return $this->db->get('jurusan')->result(); 
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_jurusan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('jurusan', $data);
    }

    public function delete_jurusan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('jurusan');
    }

    public function total_all_jurusan()
    {
        return $this->db->count_all('jurusan');
    }
}
