<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model', 'pm');
    }

    // ==================================================================================================================================================


    // start index/petugas method
    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[petugas.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');

        // cek apakah terdapat submit dari form
        if ($this->form_validation->run() == FALSE) {

            // cek link active

            $data['active1'] = '';
            $data['active2'] = '';
            $data['active3'] = 'active';
            $data['active4'] = '';
            $data['active5'] = '';
            $data['active6'] = '';

            $data['petugas'] = $this->pm->getAllPetugas();

            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('petugas/index');
            $this->load->view('template/footer');
        } else {
            // lakukan penyimpanan data
            $this->pm->insertPetugas();

            $this->session->set_flashdata(
                'petugas_message',
                '<div class="alert alert-success" role="alert">Data petugas Berhasil Disimpan!</div>'
            );

            redirect('petugas');
        }
    }
    // start index/petugas method

    // ==================================================================================================================================================
}
