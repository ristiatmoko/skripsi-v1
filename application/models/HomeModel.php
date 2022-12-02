<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
    
    function json_each_posisition() {
        $this->db->select('posisi');
        $this->db->distinct();
        $posisi = $this->db->get('pemain')->result();
        // dd($posisi);
        $arrayResult = [];
        foreach($posisi as $pos){
            $this->db->from('statistik');
            $this->db->join('pemain', 'pemain.id_pemain=statistik.id_pemain', 'right');
            $this->db->join('pertandingan', 'pertandingan.id_pertandingan=statistik.id_pertandingan', 'left');
            $this->db->join('musim', 'musim.id_musim=pertandingan.id_musim', 'left');
            $this->db->join('proses_hitung', 'proses_hitung.id_pemain=pemain.id_pemain', 'left');
            $this->db->where('pemain.posisi', $pos->posisi);
            $this->db->order_by('v', 'desc');
            // query limit
            $this->db->limit(1, 0);
            $arrayResult[$pos->posisi] = $this->db->get()->result();
        }
        
        // dd($arrayResult);
        return $arrayResult;
    }

    function json_all_players() {

        $this->db->from('statistik');
        $this->db->join('pemain', 'pemain.id_pemain=statistik.id_pemain', 'right');
        $this->db->join('pertandingan', 'pertandingan.id_pertandingan=statistik.id_pertandingan', 'left');
        $this->db->join('musim', 'musim.id_musim=pertandingan.id_musim', 'left');
        $this->db->join('proses_hitung', 'proses_hitung.id_pemain=pemain.id_pemain', 'left');
        $this->db->order_by('v', 'desc');
        $arrayResult = $this->db->get()->result();
        
        // dd($arrayResult);
        return $arrayResult;
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