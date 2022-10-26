<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
    
    // datatables
    function json() {
      $this->db->select('nisn, nama_lengkap, jenis_kelamin, tinggi_badan, berat_badan, umur');
      $query = $this->db->get('siswa');
      return $query->result();
    }

    function insert_musim($data)
    {
        $this->db->insert('musim', $data);
    }

    function get_by_id($id_musim)
    {
        $this->db->where('id_musim', $id_musim);
        return $this->db->get("musim")->row();
    }

    function update_musim($id_musim, $data)
    {
        $this->db->where("id_musim", $id_musim);
        $this->db->update("musim", $data);
    }

    function hapus_musim($id_musim)
    {
        $this->db->where("id_musim", $id_musim);
        $this->db->delete("musim");
    }

    function get_all()
    {
        $this->db->select('kode_mapel, nama_mapel');
        $query = $this->db->get('mata_pelajaran');
        return $query->result();
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */