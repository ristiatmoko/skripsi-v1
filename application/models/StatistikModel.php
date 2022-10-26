<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatistikModel extends CI_Model {
    
    // datatables
    function json() {
    //   $this->db->select('id_pertandingan, pertandingan.id_musim, versus, tanggal');
    //   $this->db->join("musim", "pertandingan.id_musim = musim.id_musim");
      $this->db->join("siswa", "statistik.id_pemain = siswa.id_pemain");
      $query = $this->db->get('statistik');
      return $query->result();
        if(!empty($id_pemain)) {   
            $this->db->where("statistik.id_pemain", $id_pemain);
        }

        return $this->db->get()->result();
    }

    function insert_statistik($data)
    {
        $this->db->insert('statistik', $data);
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