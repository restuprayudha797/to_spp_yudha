<?php

class Admin_model extends CI_Model
{

   // ===== All method for siswa =====

   // function  Insert
   public function insertSiswa()
   {
      $nisn = $this->input->post('nisn');
      $nis = $this->input->post('nis');
      $nama = $this->input->post('nama_siswa', true);
      $kelas = $this->input->post('kelas');
      $alamat = $this->input->post('alamat', true);
      $no_tlp = $this->input->post('nomor_telpon');
      $id_spp = $this->input->post('id_spp');

      // simpan pada sebuah array
      $data = [
         'nisn' => $nisn,
         'nis' => $nis,
         'nama' => $nama,
         'id_kelas' => $kelas,
         'alamat' => $alamat,
         'no_telp' => $no_tlp,
         'id_spp' => $id_spp
      ];
      // query builder simpan data siswa
      $this->db->insert('siswa', $data);
   }
   // end function  Insert


   // start updated function 
   public function updateSiswa($id)
   {

      // inisiasi nilai yang dikirim ke dalam variabel
      $nis = $this->input->post('nis');
      $nama = $this->input->post('nama_siswa');
      $kelas = $this->input->post('kelas');
      $alamat = $this->input->post('alamat');
      $no_telp = $this->input->post('nomor_telpon');
      $spp = $this->input->post('id_spp');

      // masukan ke dalam array
      $data = [
         'nis' => $nis,
         'nama' => $nama,
         'id_kelas' => $kelas,
         'alamat' => $alamat,
         'no_telp' => $no_telp,
         'id_spp' => $spp
      ];
      // query untuk update data siswa
      $this->db->where('nisn', $id);
      $this->db->update('siswa', $data);
   }
   // end updated function 

   public function getAllSiswa()
   {
      return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.id_kelas = kelas.id_kelas')->join('spp', 'siswa.id_spp = spp.id_spp')->get()->result_array();
   }

   // =====  end All method for siswa =====



   // =====   All method for kelas =====

   // start insertKelas kelas
   public function insertKelas()
   {

      $nama_kelas = $this->input->post('nama_kelas');
      $kompetensi_keahlian = $this->input->post('kompetensi_keahlian');

      $data = [
         'nama_kelas' => $nama_kelas,
         'kompetensi_keahlian' => $kompetensi_keahlian
      ];

      // query input data ke table kelas
      $this->db->insert('kelas', $data);
   }

   // end insertKelas kelas

   // start editKelas
   public function editKelas($id)
   {

      $nama_kelas = $this->input->post('nama_kelas');
      $kompetensi_keahlian = $this->input->post('kompetensi_keahlian');

      // buat array untuk data yang akan di update
      $data = [
         'nama_kelas' => $nama_kelas,
         'kompetensi_keahlian' => $kompetensi_keahlian
      ];

      // query update
      $this->db->where('id_kelas', $id);
      $this->db->update('kelas', $data);
   }
   // end editKelas


   // start method getAllKelas
   public function getAllKelas()
   {
      return $this->db->get('kelas')->result_array();
   }
   // end method getAllKelas

   // =====  end All method for kelas =====





   // =====   All method for spp =====

   // start getAllSpp
   public function getAllSpp()
   {
      // tampilkan data seluruh Spp
      $this->db->order_by('tahun', 'DESC');
      return $this->db->get('spp')->result_array();
   }
   // start getAllSpp

   public function getAllTahun()
   {
      return $this->db->get('spp')->result_array();
   }
   // =====  end All method for spp =====



}
