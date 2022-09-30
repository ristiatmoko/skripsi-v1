<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KriteriaModel extends CI_Model {
    
    // datatables
    function json() {
        $this->datatables->select('a.id_kriteria , a.nama_kriteria, a.tipe');
        $this->datatables->from('kriteria as a');
        //add this line for join
        // $this->datatables->add_column('action',anchor(site_url('controllerAtribut/edit_atribut/$1'),'<i class="fas fa-edit"></i> Edit','class="btn btn-success" title="Edit Data"')." ".anchor(site_url('controllerAtribut/hapus_atribut/$1'),'<i class="fa fa-archive"></i> Hapus','data-nama="$2" class="btn btn-danger hapus" title="Hapus Data"'), 'id_atribut,nama_kriteria');
        return $this->datatables->generate();
    }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */