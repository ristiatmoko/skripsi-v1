<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
    
    function json() {
        $this->db->from('statistik');
        $this->db->join('siswa', 'siswa.id_pemain=statistik.id_pemain');
        $this->db->join('pertandingan', 'pertandingan.id_pertandingan=statistik.id_pertandingan');
        $this->db->join('musim', 'musim.id_musim=pertandingan.id_musim');
        $query = $this->db->get()->result();
        return $query;
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