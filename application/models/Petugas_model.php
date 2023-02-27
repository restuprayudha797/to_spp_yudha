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


}
