<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemainModel extends CI_Model {
    
    // datatables
    // function json() {
    //     $this->datatables->select('a.slug, a.no_punggung, a.nama_lengkap, a.posisi, a.tinggi_badan, a.berat_badan, a.umur, a.id_pemain');
    //     $this->datatables->from('pemain as a');
    //     //add this line for join
    //     $this->datatables->add_column('action',
    //      anchor(site_url('controllerStatistik/insert_statistik/$1'),'<i class="fas fa-edit"></i> Statistik','class="btn btn-danger btn-sm btn-block" title="Edit Data"')." ".
    //     anchor(site_url('ControllerPemain/edit_siswa/$1'),'<i class="fas fa-edit"></i> Edit','class="btn btn-success btn-sm btn-block" title="Edit Data"')." ".
    //     anchor(site_url('ControllerPemain/hapus_siswa/$1'),'<i class="fa fa-archive"></i> Hapus','data-nama_siswa="$2" class="btn btn-primary btn-sm btn-block" title="Hapus Data"'), 'id_pemain,nama_lengkap');
    //     return $this->datatables->generate();
    // }


    function json() {
        $this->db->select('id_pemain, no_punggung, nama_lengkap, posisi, tinggi_badan, berat_badan, umur');
        $query = $this->db->get('pemain');
        return $query->result();
    }

    function insert_pemain($data)
    {
        $this->db->insert('pemain', $data);

        $this->db->insert('statistik', [
            'id_pemain' => $this->db->insert_id()
        ]);
    }

    function get_by_id($id_pemain)
    {
        $this->db->where('id_pemain', $id_pemain);
        return $this->db->get("pemain")->row();
    }

    function update_pemain($id_pemain, $data)
    {
        $this->db->where("id_pemain", $id_pemain);
        $this->db->update("pemain", $data);
    }

    function delete_pemain($id_pemain)
    {
        $this->db->where("id_pemain", $id_pemain);
        $this->db->delete("pemain");
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