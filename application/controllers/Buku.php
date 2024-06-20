<?php

defined("BASEPATH") OR exit("No direct script access allowed");

class Buku extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model("m_buku");
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('upload'); // Load library upload
    }

    public function index($page = 0){
        $config['base_url'] = base_url('buku/index');
        $config['total_rows'] = $this->m_buku->get_count();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        
        $data['user'] = $this->m_buku->ambil_data($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view("v_header", $data);
        $this->load->view("v_buku", $data);
        $this->load->view("v_footer", $data);
    }

    function tambah() {
        $this->load->view('v_inputbuku');
    }

    function tambah_aksi() {
        $this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('genre', 'Genre', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_inputbuku');
        } else {
            $id_buku = $this->input->post('id_buku');
            $nama_buku = $this->input->post('nama_buku');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $genre = $this->input->post('genre');
            $tahun_terbit = $this->input->post('tahun_terbit');

            // Konfigurasi upload file
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('sampul_buku')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('v_inputbuku', $error);
            } else {
                $upload_data = $this->upload->data();
                $sampul_buku = 'assets/uploads/'.$upload_data['file_name'];

                $data = array(
                    'id_buku' => $id_buku,
                    'nama_buku' => $nama_buku,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'genre' => $genre,
                    'tahun_terbit' => $tahun_terbit,
                    'sampul_buku' => $sampul_buku // Simpan path file gambar sampul di database
                );

                $input = $this->m_buku->input_data($data);
                if ($input) {
                    $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data');
                }

                redirect('buku/index');
            }
        }
    }

    function hapus($id) {
        $delete = $this->m_buku->hapus_data($id);

        if ($delete) {
            $this->session->set_flashdata('message', 'Data ID'.$id.' berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data ID: '.$id);
        }

        redirect('buku/index');
    }

    function edit($id) {
        $data['user'] = $this->m_buku->getById($id);
        $this->load->view('v_editbuku', $data);
    }

    function update() {
        $this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('genre', 'Genre', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_buku');
            $this->edit($id);
        } else {
            $id_buku = $this->input->post('id_buku');
            $nama_buku = $this->input->post('nama_buku');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $genre = $this->input->post('genre');
            $tahun_terbit = $this->input->post('tahun_terbit');

            // Konfigurasi upload file
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('sampul_buku')) {
                $sampul_buku = $this->input->post('existing_cover_image'); // Gunakan cover image yang sudah ada
            } else {
                $upload_data = $this->upload->data();
                $sampul_buku = 'assets/uploads/'.$upload_data['file_name'];
            }

            $data = array(
                'id_buku' => $id_buku,
                'nama_buku' => $nama_buku,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'genre' => $genre,
                'tahun_terbit' => $tahun_terbit,
                'sampul_buku' => $sampul_buku // Simpan path file gambar sampul di database
            );

            $update = $this->m_buku->update_data($data, $id_buku);
            if ($update) {
                $this->session->set_flashdata('message', 'Data berhasil diubah.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah data.');
            }
            redirect('buku/index');
        }
    }
}
?>
