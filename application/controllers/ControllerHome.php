<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerHome extends CI_Controller
{

    

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('HomeModel');
        $this->load->library('form_validation');
        $this->load->library('upload');
        if (empty($this->session->session_login['username'])) {
            $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
            redirect(site_url("controllerLogin"));
        }
    }

    public function json_each_posisition()
    {
        return $this->HomeModel->json_each_posisition();
    }

    public function json_all_players()
    {
        return $this->HomeModel->json_all_players();
    }

    public function index()
    {     
        // dd('a');
        $this->load->view("header");
        $this->load->view('dashboard', [
            'posisitions' => $this->json_each_posisition(),
            'homes' => $this->json_all_players()
        ]);
        $this->load->view("footer");
    }
    
    public function about()
    {
        $this->nama = "RISTI";
        echo "Halo saya $this->nama";
    }
}
