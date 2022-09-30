<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KlasifikasiModel extends CI_Model {
    
    // datatables
    function json() {
        $this->datatables->select('a.id_klasifikasi, a.nis, a.absensi, a.penghasilan_ortu, a.prestasi, a.hasil_tes, a.nilai_rapot, b.nama_lengkap');
        $this->datatables->from('klasifikasi as a');
        //add this line for join
        $this->datatables->join('siswa as b', 'a.nis=b.nis');
        $this->datatables->add_column('action',anchor(site_url('controllerKlasifikasi/hapus_klasifikasi/$1'),'<i class="fa fa-archive"></i> Hapus','class="btn btn-danger hapus" title="Hapus Data"'), 'id_klasifikasi');
        return $this->datatables->generate();
    }

    function insert_klasifikasi($data)
    {
        $this->db->insert('klasifikasi', $data);
    }

    function get_by_id($nis)
    {
        $this->db->where('id_klasifikasi', $nis);
        return $this->db->get("klasifikasi")->row();
    }

    function update_kriteria($nis, $data)
    {
        $this->db->where("id_klasifikasi", $nis);
        $this->db->update("klasifikasi", $data);
    }

    function delete_klasifikasi($nis)
    {
        $this->db->where("id_klasifikasi", $nis);
        $this->db->delete("klasifikasi");
    }

    function get_all_siswa()
    {
        return $this->db->get('siswa')->result();
    }

    function get_all_kriteria()
    {
        $this->db->select("a.range_nilai, b.nama_kriteria, c.nilai_bobot");
        $this->db->from("kriteria as a");
        $this->db->join("atribut as b", "a.id_atribut =b.id_atribut");
        $this->db->join("bobot as c", "a.id_bobot =c.id_bobot");
        return $this->db->get()->result();
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */