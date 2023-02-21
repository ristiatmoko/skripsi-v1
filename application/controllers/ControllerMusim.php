<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerMusim extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MusimModel');
        $this->load->library('form_validation');
        $this->load->library('Datatables');
        $this->load->helper(array('form', 'url', 'download', 'file'));
        if (empty($this->session->userdata('username'))) {
            $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
            redirect(site_url("ControllerLogin"));
        }
    }

    public function json()
    {
        return $this->MusimModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('musim/listMusim', ['musims' => $this->json()]);
        $this->load->view('footer');
    }

    public function insert_musim()
    {
        $this->load->view('header');
        $this->load->view('musim/formMusim');
        $this->load->view('footer');
    }

    public function insert_musim_action()
    {
        $data = [
          'musim' => $this->input->post("musim")  
        ];

        // dd($data);

        $this->MusimModel->insert_musim($data);

        $this->session->set_flashdata("flash_message", "Berhasil tambah data musim.");
        redirect(site_url("ControllerMusim"));
    }


    public function edit_musim_form($id_musim)
    {
        $this->db->where('id_musim', $id_musim);
        $musim = $this->db->get("musim")->row();
        $data = [
          'musim' => $musim
        ];

        $this->load->view('header');
        $this->load->view('musim/formMusimEdit', $data);
        $this->load->view('footer');
    }

    public function edit_musim_action($id_musim)
    {
        $data = [
          'musim' => $this->input->post("musim"),
        ];
        // dd($data);

        $this->MusimModel->update_musim($id_musim, $data);


        $this->session->set_flashdata("flash_message", "Berhasil update data musim.");
        redirect(site_url("ControllerMusim"));
    }

    public function hapus_musim_action($id_musim)
    {
        $data_musim = $this->MusimModel->get_by_id($id_musim);
        if ($data_musim) {
          $this->MusimModel->hapus_musim($id_musim);
          $this->session->set_flashdata("flash_message", "Berhasil hapus data Kriteria.");
          redirect(site_url("ControllerMusim"));
        } else {
          $this->session->set_flashdata("error_message", "Gagal hapus data Kriteria.");
          redirect(site_url("ControllerMusim"));
        }
    }
}
