<?php
class Petugas_model extends CI_Model
{

    // ==================================================================================================================================================

    // start all method for petugas

    // start getAllpetugas method
    public function getAllpetugas()
    {
        // tampilkan data seluruh kelas
        return $this->db->get('petugas')->result_array();
    }
    // end getAllpetugas method

    // start insertPetugas method
    public function insertPetugas()
    {
        // inisialisasi value yang dikirim ke dalam variabel
        $username = $this->input->post('username', true);
        $name    = $this->input->post('nama_petugas', true);
        $pass    = $this->input->post('password', true);
        $level   = $this->input->post('level');
        $active  = $this->input->post('aktif');

        // enkripsi password terlebih dahulu
        $pw = password_hash($pass, PASSWORD_DEFAULT);

        // simpan dalam array
        $data = [
            'username' => $username,
            'password' => $pw,
            'nama_petugas' => $name,
            'level' => $level,
            'aktif' => $active
        ];

        // query simpan data
        $this->db->insert('petugas', $data);
    }
    // end insertPetugas method


    // end all method for petugas

    // ==================================================================================================================================================


    // start all method for pembayaran

    // start method tambahBayar
    public function tambahBayar()
    {

        $id_pembayaran = time();
        $id_petugas = $this->input->post('id_petugas');
        $id_kelas = $this->input->post('id_kelas');
        $id_spp = $this->input->post('id_spp');
        $nisn = $this->input->post('nisn');
        $tgl_bayar = mdate('%Y-%m-%d', time());
        $bln_bayar = $this->input->post('bulan');
        $thn_bayar = $this->input->post('tahun');
        $jumlah = $this->input->post('spp');

        // simpan ke dalam array
        $data = [
            'id_pembayaran' => $id_pembayaran,
            'id_petugas' => $id_petugas,
            'nisn' => $nisn,
            'tgl_bayar' => $tgl_bayar,
            'bulan_bayar' => $bln_bayar,
            'tahun_bayar' => $thn_bayar,
            'id_kelas' => $id_kelas,
            'id_spp' => $id_spp,
            'jumlah_bayar' => $jumlah
        ];

        $this->db->insert('pembayaran', $data);
    }
    // end  method tambahBayar

    // end all method for pembayaran

    // ==================================================================================================================================================

    // start all method for laporan

    // end  method getAllpembayaran
    public function getAllpembayaran()
    {
        // return $this->db->get('pembayaran')->result_array();
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'pembayaran.nisn = siswa.nisn');
        $this->db->join('kelas', 'pembayaran.id_kelas = kelas.id_kelas');
        $this->db->order_by('pembayaran.id_pembayaran', 'DESC');
        return $this->db->get()->result_array();
    }
    // end  method getAllpembayaran

    // start  method getPembayaranByMonth
    public function getPembayaranByMonth($bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'pembayaran.nisn = siswa.nisn');
        $this->db->join('kelas', 'pembayaran.id_kelas = kelas.id_kelas');
        $this->db->where('MONTH(tgl_bayar)', $bulan);
        $this->db->order_by('pembayaran.id_pembayaran', 'DESC');
        return $this->db->get()->result_array();
    }
    // end  method getPembayaranByMonth


    // end all method for laporan
}
