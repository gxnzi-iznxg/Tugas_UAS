<?php

defined("BASEPATH") OR exit("No direct script access allowed");

class Pinjam extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("m_pinjam");
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('tanggal');
    }

    public function index($page = 0){
        $config['base_url'] = base_url('pinjam/index');
        $config['total_rows'] = $this->m_pinjam->get_count();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        
        $data['user'] = $this->m_pinjam->ambil_data($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view("v_header", $data);
        $this->load->view("v_pinjam", $data);
        $this->load->view("v_footer", $data);
    }


    function tambah() {
        $this->load->view('v_inputpinjam');
    }

    function tambah_aksi() {
        // Aturan validasi
        $this->form_validation->set_rules('id_peminjam', 'ID Peminjam', 'required');
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|numeric');
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_inputpinjam');
        } else {
            $id_peminjam = $this->input->post('id_peminjam');
            $nama_peminjam = $this->input->post('nama_peminjam');
            $no_telp = $this->input->post('no_telp');
            $nama_buku = $this->input->post('nama_buku');
            $tgl_pinjam = $this->input->post('tgl_pinjam');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $data = array(
                'id_peminjam'=> $id_peminjam,
                'nama_peminjam'=> $nama_peminjam,
                'no_telp'=> $no_telp,
                'nama_buku'=> $nama_buku,
                'tgl_pinjam'=> $tgl_pinjam,
                'tgl_kembali'=> $tgl_kembali
            );

            $tgl_pinjam_formatted = $this->tanggal->convert_date_format($tgl_pinjam);
            $tgl_kembali_formatted = $this->tanggal->convert_date_format($tgl_kembali);

            // Gunakan library untuk menghitung selisih hari
            $selisih_hari = $this->tanggal->calculate_date_diff($tgl_pinjam, $tgl_kembali);

            // Gunakan library untuk mendapatkan nama hari
            $nama_hari_pinjam = $this->tanggal->get_day_name($tgl_pinjam);
            $nama_hari_kembali = $this->tanggal->get_day_name($tgl_kembali);

            $input = $this->m_pinjam->input_data($data);
            if ($input) {
                $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data');
            }

            redirect('pinjam/index');
        }
    }

    function hapus($id) {
        $where = array('id_peminjam' => $id);
        $delete = $this->m_pinjam->hapus_data($id);

        if ($delete) {
            $this->session->set_flashdata('message', 'Data ID'.$id.' berhasil dihapus,');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data ID: '.$id) ;
        }

        redirect('pinjam/index');
    }

    function edit($id) {
        $data['user'] = $this->m_pinjam->getById($id);
        $this->load->view('v_editpinjam', $data);
    }

    function update() {
        $this->form_validation->set_rules('id_peminjam', 'ID Peminjam', 'required');
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|numeric');
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_peminjam');
            $this->edit($id);
        } else {
            $id_peminjam = $this->input->post('id_peminjam');
            $nama_peminjam = $this->input->post('nama_peminjam');
            $no_telp = $this->input->post('no_telp');
            $nama_buku = $this->input->post('nama_buku');
            $tgl_pinjam = $this->input->post('tgl_pinjam');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $data = array(
                'id_peminjam'=> $id_peminjam,
                'nama_peminjam'=> $nama_peminjam,
                'no_telp'=> $no_telp,
                'nama_buku'=> $nama_buku,
                'tgl_pinjam'=> $tgl_pinjam,
                'tgl_kembali'=> $tgl_kembali
            );

            $update = $this->m_pinjam->update_data($data, $id_peminjam);
            if($update) {
                $this->session->set_flashdata('message', 'Data berhasil diubah');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah data');
            }
            redirect('pinjam/index');
        }
    }

}

?>
