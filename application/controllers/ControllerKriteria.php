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
        if (empty($this->session->session_login['username'])) {
            $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
            redirect(site_url("controllerLogin"));
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
    
}
