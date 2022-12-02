<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatistikModel extends CI_Model {
    
    // datatables
    function json() {
    //   $this->db->select('id_pertandingan, pertandingan.id_musim, versus, tanggal');
    //   $this->db->join("musim", "pertandingan.id_musim = musim.id_musim");
        $this->db->join("pemain", "statistik.id_pemain = pemain.id_pemain");
      //   return $query->result();
        if(!empty($id_pemain)) {   
            $this->db->where("statistik.id_pemain", $id_pemain);
        }

        $query = $this->db->get('statistik')->result();
        // dd($query);
        return $query;
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

    function update_statistik($id_statistik, $data)
    {
        $this->db->where("id_statistik", $id_statistik);
        $this->db->update("statistik", $data);
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