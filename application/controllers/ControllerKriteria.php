<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('KriteriaModel');
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
        header('Content-Type: application/json');
        echo $this->KriteriaModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('kriteria/listKriteria');
        $this->load->view('footer');
    }

    public function insert_kriteria()
    {
        $this->load->view('header');
        $this->load->view('kriteria/formKriteria');
        $this->load->view('footer');
    }
    
    public function insert_kriteria_action()
    {
        $data = [
            'bobot_preferensi' => $this->input->post("bobot_preferensi"),
            'nama_kriteria'    => $this->input->post("nama_kriteria"),
            'bobot_kepentingan'    => $this->input->post("bobot_kepentingan"),
            'tipe'             => $this->input->post("tipe")
        ];

        // dd($data);

        $this->KriteriaModel->insert_kriteria($data);

        $this->session->set_flashdata("flash_message", "Berhasil tambah data kriteria.");
        redirect(site_url("ControllerKriteria"));
    }

    public function edit_kriteria_form($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $kriteria = $this->db->get("kriteria")->row();
        $data = [
            'kriteria' => $kriteria
        ];

        $this->load->view('header');
        $this->load->view('kriteria/formKriteriaEdit', $data);
        $this->load->view('footer');
    }

    public function edit_kriteria_action($id_kriteria)
    {
        $data = [
            'bobot_preferensi' => $this->input->post("bobot_preferensi"),
            'nama_kriteria'    => $this->input->post("nama_kriteria"),
            'bobot_kepentingan'    => $this->input->post("bobot_kepentingan"),
            'tipe'             => $this->input->post("tipe")
        ];

        // dd($data);

        $this->KriteriaModel->update_kriteria($id_kriteria, $data);


        $this->session->set_flashdata("flash_message", "Berhasil update data kriteria.");
        redirect(site_url("ControllerKriteria"));
    }

    public function hapus_kriteria_action($id_kriteria)
    {
        $data_kriteria = $this->KriteriaModel->get_by_id($id_kriteria);
        if ($data_kriteria) {
            $this->KriteriaModel->delete_kriteria($id_kriteria);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data Kriteria.");
            redirect(site_url("ControllerKriteria"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data Kriteria.");
            redirect(site_url("ControllerKriteria"));
        }
    }
}
