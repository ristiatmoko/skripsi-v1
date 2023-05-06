<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PertandinganModel extends CI_Model
{

    // datatables
    function json()
    {
        //   $this->db->select('id_pertandingan, pertandingan.id_musim, versus, tanggal');
        $this->db->join("musim", "pertandingan.id_musim = musim.id_musim");
        $query = $this->db->get('pertandingan');
        return $query->result();
        if (!empty($id_musim)) {
            $this->db->where("pertandingan.id_musim", $id_musim);
        }

        return $this->db->get()->result();
    }

    function insert_pertandingan($data)
    {
        $this->db->insert('pertandingan', $data);
    }

    function get_by_id($id_pertandingan)
    {
        $this->db->where('id_pertandingan', $id_pertandingan);
        return $this->db->get("pertandingan")->row();
    }

    function update_pertandingan($id_pertandingan, $data)
    {
        $this->db->where("id_pertandingan", $id_pertandingan);
        $this->db->update("pertandingan", $data);
    }

    function hapus_pertandingan($id_pertandingan)
    {
        $this->db->where("id_pertandingan", $id_pertandingan);
        $this->db->delete("pertandingan");
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