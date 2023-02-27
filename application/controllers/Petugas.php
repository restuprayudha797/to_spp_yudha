<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model', 'pm');
        $this->load->model('Admin_model', 'sm');

        if (!$this->session->userdata('id_petugas')) {

            redirect('auth');
        }
    }

    // ==================================================================================================================================================

    // start all method petugas

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


            $data['petugas'] = $this->pm->getAllPetugas();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
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
    // end index/petugas method

    // end all method petugas

    // ==================================================================================================================================================

    // start all method pembayaran

    // start pembayaran method
    public function pembayaran()
    {
        $data['active1'] = '';
        $data['active2'] = '';
        $data['active3'] = '';
        $data['active4'] = 'active';
        $data['active5'] = '';


        $data['siswa'] = $this->sm->getAllSiswa();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('petugas/pembayaran');
        $this->load->view('template/footer');
    }
    // end pembayaran method

    // start method tambahBayar
    public function tambahBayar()
    {
        $this->pm->tambahBayar();

        $this->session->set_flashdata(
            'petugas_message',
            '<div class="alert alert-success" role="alert">data Pembayaran berhasil disimpan</div>'
        );

        redirect('petugas/pembayaran');
    }
    // end method tambahBayar


    // end all method pembayaran


    // ==================================================================================================================================================

    // start all method laporan

    // start method laporan
    public function laporan()
    {
        $data['active1'] = '';
        $data['active2'] = '';
        $data['active3'] = '';
        $data['active4'] = '';
        $data['active5'] = 'active';


        $data['siswa'] = $this->pm->getAllpembayaran();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('petugas/laporan');
        $this->load->view('template/footer');
    }
    // end method laporan

    // start method cetakLaporan
    public function cetakLaporan()
    {

        $data['title'] = 'Laporan Pembayaran SPP';
        $data['spp'] = $this->pm->getAllpembayaran();

        $this->load->view('petugas/cetakLaporan', $data);
    }
    // end method cetakLaporan

    // start method cetakLaporan
    public function getPembayaranByMonth()
    {

        $bulan = date('m', time());
        $data['title'] = 'Laporan Pembayaran SPP';
        $data['spp'] = $this->pm->getPembayaranByMonth($bulan);

        $this->load->view('petugas/cetakLaporan', $data);
    }
    // end method cetakLaporan

    // start all method laporan
}
