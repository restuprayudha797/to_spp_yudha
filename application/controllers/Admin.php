<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'am');

        if (!$this->session->userdata('id_petugas')) {

            redirect('auth');
        } else {
            $petugas = $this->db->get_where('petugas', ['id_petugas' => $this->session->userdata('id_petugas')])->row_array();
            if ($petugas['level'] == 'petugas') {
                redirect('petugas');
            }
        }
    }

    // ==================================================================================================================================================


    // start index method
    public function index()
    {

        // cek link active

        $data['active1'] = 'active';
        $data['active2'] = '';
        $data['active3'] = '';
        $data['active4'] = '';
        $data['active5'] = '';
        $data['active6'] = '';

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('admin/index');
        $this->load->view('template/footer');
    }
    // start index method

    // ==================================================================================================================================================

    // ===== start method for siswa =====

    // start siswa method
    public function siswa()
    {
        // cek link active

        // setrules untuk form validation
        $this->form_validation->set_rules('nisn', 'NISN', 'is_natural|trim|min_length[5]|is_unique[siswa.nisn]');
        $this->form_validation->set_rules('nis', 'NIS', 'is_natural|trim');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('nomor_telpon', 'No. Telp', 'is_natural|trim');
        // cek apakah ada nilai form yang dikirim
        if ($this->form_validation->run() == FALSE) {

            $data['active1'] = '';
            $data['active2'] = 'active';
            $data['active3'] = '';
            $data['active4'] = '';
            $data['active5'] = '';
            $data['active6'] = '';

            $data['siswa'] = $this->am->getAllSiswa();
            $data['kelas'] = $this->am->getAllKelas();
            $data['tahun'] = $this->am->getAllTahun();

            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('admin/siswa');
            $this->load->view('template/footer');
        } else {

            // simpan data siswa melalui model siswa
            $this->am->insertSiswa();

            $this->session->set_flashdata(
                'admin_message',
                '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>'
            );
            redirect('admin/siswa');
        }
    }
    // end siswa method


    // start deleteSiswa
    public function deleteSiswa($id)
    {
        $this->db->where('nisn', $id);
        $this->db->delete('siswa');

        $this->session->set_flashdata(
            'admin_message',
            '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>'
        );
        redirect('admin/siswa');
    }
    // end deleteSiswa

    // start siswa siswaUpdate
    public function siswaUpdate($id)
    {

        // update data siswa melalui model siswa
        $this->am->updateSiswa($id);
        $this->session->set_flashdata(
            'admin_message',
            '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>'
        );
        redirect('admin/siswa');
    }
    // end siswa siswaUpdate

    // ===== end method for siswa =====

    // ==================================================================================================================================================

    // ===== start all method for kelas =====


    // start kelas method
    public function kelas()
    {

        //set rules
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('kompetensi_keahlian', 'Kompetensi Keahlian', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == FALSE) {

            $data['active1'] = '';
            $data['active2'] = 'active';
            $data['active3'] = '';
            $data['active4'] = '';
            $data['active5'] = '';
            $data['active6'] = '';

            $data['kelas'] = $this->am->getAllKelas();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('admin/kelas');
            $this->load->view('template/footer');
        } else {

            $this->am->insertKelas();

            $this->session->set_flashdata(
                'admin_message',
                '<div class="alert alert-success" role="alert">Data kelas Berhasil Ditambahkan!</div>'
            );
            redirect('admin/kelas');
        }
    }
    // start kelas method

    // start editKelas
    public function editKelas($id)
    {
        $this->am->editKelas($id);

        $this->session->set_flashdata(
            'admin_message',
            '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>'
        );
        redirect('admin/kelas');
    }
    // end editKelas

    // start deleteKelas
    public function deleteKelas($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');

        $this->session->set_flashdata(
            'admin_message',
            '<div class="alert alert-success" role="alert">Data kelas Berhasil Dihapus!</div>'
        );
        redirect('admin/kelas');
    }
    // end deleteKelas

    // ===== end all method for kelas =====

    // ==================================================================================================================================================

    // ===== start all method for spp =====

    // start method spp
    public function spp()
    {

        //set rules
        $this->form_validation->set_rules('tahun', 'Tahun spp', 'is_natural|trim|max_length[4]|is_unique[spp.tahun]');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['active1'] = '';
            $data['active2'] = 'active';
            $data['active3'] = '';
            $data['active4'] = '';
            $data['active5'] = '';
            $data['active6'] = '';

            $data['spp'] = $this->am->getAllSpp();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('admin/spp');
            $this->load->view('template/footer');
        } else {
            $this->sm->insertSpp();

            $this->session->set_flashdata(
                'admin_message',
                '<div class="alert alert-success" role="alert">Data spp Berhasil Disimpan!</div>'
            );
            redirect('admin/spp');
        }
    }
    // end method spp

    // start method deleteSpp
    public function deleteSpp($id)
    {
        $this->db->where('id_spp', $id);
        $this->db->delete('spp');

        $this->session->set_flashdata(
            'admin_message',
            '<div class="alert alert-success" role="alert">Data spp Berhasil Dihapus!</div>'
        );
        redirect('admin/spp');
    }
    // end method deleteSpp


    // ===== start all method for spp =====

    // ==================================================================================================================================================





}
