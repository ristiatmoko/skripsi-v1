<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KriteriaModel extends CI_Model {
    
    // datatables
    function json() {
        $this->datatables->select('id_kriteria , nama_kriteria,bobot_kepentingan, tipe, CONCAT(bobot_preferensi, " (", nama_kriteria, ") ") AS kriteria_concat');
        $this->datatables->from('kriteria');
        // add this line for join
        $this->datatables->add_column('action',anchor(site_url('controllerKriteria/edit_kriteria_form/$1'),'<i class="fas fa-edit"></i> Edit','class="btn btn-danger" title="Edit Data"')." ".anchor(site_url('controllerKriteria/hapus_kriteria_action/$1'),'<i class="fa fa-archive"></i> Hapus','data-nama="$2" class="btn btn-primary hapus" title="Hapus Data"'), 'id_kriteria,nama_kriteria');
        return $this->datatables->generate();
    }

    function insert_kriteria($data)
    {
        $this->db->insert('kriteria', $data);
    }

    function get_by_id($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get("kriteria")->row();
    }

    function update_kriteria($id, $data)
    {
        $this->db->where("id_kriteria", $id);
        $this->db->update("kriteria", $data);
    }

    function delete_kriteria($id)
    {
        $this->db->where("id_kriteria", $id);
        $this->db->delete("kriteria");
    }
    
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */