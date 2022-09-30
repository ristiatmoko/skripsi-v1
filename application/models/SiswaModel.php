<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {
    
    // datatables
    function json() {
        $this->datatables->select('a.nisn, a.nama_lengkap, a.tanggal_lahir, a.jenis_kelamin, a.alamat, a.asal_sekolah');
        $this->datatables->from('siswa as a');
        //add this line for join
        $this->datatables->add_column('action',anchor(site_url('controllerSiswa/edit_siswa/$1'),'<i class="fas fa-edit"></i> Edit','class="btn btn-success btn-block" title="Edit Data"')." ".anchor(site_url('controllerSiswa/hapus_siswa/$1'),'<i class="fa fa-archive"></i> Hapus','data-nama_siswa="$2" class="btn btn-danger hapus btn-block" title="Hapus Data"'), 'nisn,nama_lengkap');
        return $this->datatables->generate();
    }

    function insert_siswa($data)
    {
        $this->db->insert('siswa', $data);
    }

    function get_by_id($nisn)
    {
        $this->db->where('nisn', $nisn);
        return $this->db->get("siswa")->row();
    }

    function update_siswa($nis, $data)
    {
        $this->db->where("nisn", $nis);
        $this->db->update("siswa", $data);
    }

    function delete_siswa($nis)
    {
        $this->db->where("nisn", $nis);
        $this->db->delete("siswa");
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