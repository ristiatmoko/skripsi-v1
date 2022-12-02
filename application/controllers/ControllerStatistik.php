<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStatistik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('StatistikModel');
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
        return $this->StatistikModel->json();
    }

    public function index()
    {
      // dd($this->json());
        $this->load->view('header');
        $this->load->view('statistik/listStatistik', ['statistiks' => $this->json()]);
        $this->load->view('footer');
    }


    public function update_statistik($id)
    {   
      // dd($id);
        $this->db->join('pemain', 'statistik.id_pemain = pemain.id_pemain');
        $this->db->where('id_statistik', $id);
        $statistik = $this->db->get("statistik")->row();
        // dd($statistik);
        $pertandingan = $this->db->get("pertandingan")->result();
        $data = [
          'statistik' => $statistik,
          'pertandingan' => $pertandingan,
          
          // 'gol' => $gol,
          // 'assist' => $assist,
          // 'main' => $main,
          // 'kartu_merah' => $kartu_merah,
          // 'kartu_kuning' => $kartu_kuning,

        ];
        

        $this->load->view('header');
        $this->load->view('statistik/formStatistik', $data);
        $this->load->view('footer');
    }

    public function update_statistik_action($id_pemain)
    {   
        
        $data = [
          // 'allMusim'  => $this->HasilModel->allMusim(),
          // 'id_pemain'         => $this->input->post("id_pemain"),
          'id_pertandingan'  => $this->input->post("id_pertandingan"),
          'gol'           => $this->input->post("gol"),
          'assist'        => $this->input->post("assist"),
          'main'          => $this->input->post("main"),
          'kartu_merah'   => $this->input->post("kartu_merah"),
          'kartu_kuning'  => $this->input->post("kartu_kuning"),
          'motm'          => $this->input->post("motm"),
        ];

        // dd($data);

        $this->StatistikModel->update_statistik($id_pemain, $data);

        // $this->StatistikModel->insert_statistik($data);

        $this->session->set_flashdata("flash_message", "Berhasil tambah data musim.");
        redirect(site_url("ControllerStatistik"));
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
