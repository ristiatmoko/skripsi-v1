<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	function allUsers()
    {
        $results = $this->db->get_where("user", ['level' => 'admin'])->result();
        return $results;
    }

	function validasi($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function updateUser($username_lama, $data)
	{
		$this->db->where("username", $username_lama);
		$this->db->update("user", $data);
	}

	function insert_admin($data)
    {
        $this->db->insert('user', $data);
    }

	function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get("user")->row();
    }

    function update_admin($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("user", $data);
    }

    function delete_admin($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("user");
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */