<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_users()
    {
        $this->db->select('users.*, jurusan.nama_jurusan as nama_jurusan');
        $this->db->from('users');
        $this->db->join('jurusan', 'jurusan.id = users.jurusan_id', 'left'); 
        return $this->db->get()->result();
    }
    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

   
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
        public function total_all_users() {
            return $this->db->count_all('users'); 
        }
    }
    
