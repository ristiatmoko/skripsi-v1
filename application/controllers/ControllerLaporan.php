<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerLaporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('HasilModel');
        $this->load->library('form_validation');
        $this->load->library('Datatables');
        $this->load->helper(array('form', 'url', 'download', 'file'));
        if (empty($this->session->session_login['username'])) {
            $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
            redirect(site_url("controllerLogin"));
        }
    }

    public function json_hasil()
    {
        header('Content-Type: application/json');
        echo $this->HasilModel->json_hasil();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('laporan/listLaporan');
        $this->load->view('footer');
    }

    public function ulangi_perhitungan()
    {
        $this->session->unset_userdata("kriteria_bobot");
        $this->db->truncate('normalisasi');
        $this->db->truncate('hasil');
        redirect(site_url("ControllerLaporan"));

    }

    public function cetak()
    {
        $data["siswa"] = $this->HasilModel->get_data_hasil();
        $this->load->view('laporan/cetak', $data);
    }
}
