<?php

defined("BASEPATH") OR exit("No direct script access allowed");

class M_Pinjam extends CI_Model {
    function ambil_data($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('peminjaman');
        return $query->result();
    }

    function get_count() {
        return $this->db->count_all('peminjaman');
    }

    function input_data($data) {
        try {
            $this->db->insert('peminjaman', $data);
            return true;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }

    function hapus_data($id) {
        try {
            $this->db->where('id_peminjam', $id); // Menambahkan klausa 'where'
            $this->db->delete('peminjaman'); 
            
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                throw new Exception('Gagal menghapus data atau data tidak ditemukan');
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return FALSE;
        }
    }

    function getById($id) {
        $query = $this->db->get_where('peminjaman', array('id_peminjam' => $id));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    function update_data($data, $id) {
        try {
            $this->db->where('id_peminjam', $id);
            $this->db->update('peminjaman', $data);
            return true;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }
}