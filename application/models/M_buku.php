<?php

defined("BASEPATH") OR exit("No direct script access allowed");

class M_buku extends CI_Model {
    function ambil_data($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('buku');
        return $query->result();
    }

    function get_count() {
        return $this->db->count_all('buku');
    }

    function input_data($data) {
        try {
            $this->db->insert('buku', $data);
            return true;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }

    function hapus_data($id) {
        try {
            $this->db->where('id_buku', $id);
            $this->db->delete('buku'); 
            
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
        $query = $this->db->get_where('buku', array('id_buku' => $id));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    function update_data($data, $id) {
        try {
            $this->db->where('id_buku', $id);
            $this->db->update('buku', $data);
            return true;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }
}

?>
