<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilModel extends CI_Model
{

    function allSiswa()
    {
        $results = $this->db->join("statistik", "statistik.id_pemain=siswa.id_pemain")->get("siswa")->result();
        // dd($results);
        return $results;
    }
    
    function get_all_album_data() {

        $this->db->select ( '*' ); 
        $this->db->from ( 'Album' );
        $this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
        $this->db->join ( 'Soundtrack', 'Soundtrack.album_id = Album.album_id' , 'left' );
        $query = $this->db->get ();
        return $query->result ();
     }

    function get_proses_hitung($nisn)
    {
        $this->db->select("s, proses_hitung.nisn, kode_jurusan, siswa.nama_lengkap");
        $this->db->from("proses_hitung");
        $this->db->join("siswa", "proses_hitung.nisn=siswa.nisn");
        if(!empty($nisn)) {   
            $this->db->where("proses_hitung.nisn", $nisn);
        }

        return $this->db->get()->result();
    }

    function json_hasil() {
        $this->datatables->select("a.nisn, a.rekomendasi_jurusan, b.nama_lengkap");
        $this->datatables->from('hasil as a');
        //add this line for join
        $this->datatables->join('siswa as b', 'a.nisn=b.nisn');
        return $this->datatables->generate();
    }

    function get_data_hasil()
    {
        $this->db->select('a.*, b.*');
        $this->db->from("hasil as a");
        $this->db->join("siswa as b", "a.nisn=b.nisn");
        return $this->db->get()->result();
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */