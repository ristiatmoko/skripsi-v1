<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPertandingan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('PertandinganModel');
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
        return $this->PertandinganModel->json();
    }

    public function index()
    {
      // dd($this->json());
        $this->load->view('header');
        $this->load->view('pertandingan/listPertandingan', ['matchs' => $this->json()]);
        $this->load->view('footer');
    }


    public function insert_pertandingan()
    {   
        // $this->db->where('id_musim', $musim);
        $musim = $this->db->get("musim")->result_array();
        $data = [
          'musim' => $musim
        ];

        $this->load->view('header');
        $this->load->view('pertandingan/formPertandingan', $data);
        $this->load->view('footer');
    }

    public function insert_pertandingan_action()
    {   
        
        $data = [
          // 'allMusim'  => $this->HasilModel->allMusim(),
          // 'id_pertandingan' => $this->input->post("id_pertandingan"),
          'id_musim' => $this->input->post("id_musim"),
          'versus' => $this->input->post("versus"),
          'tanggal' => $this->input->post("tanggal"),

        ];

        // dd($data);

        $this->PertandinganModel->insert_pertandingan($data);

        $this->session->set_flashdata("flash_message", "Berhasil tambah data musim.");
        redirect(site_url("ControllerPertandingan"));
    }


    public function edit_pertandingan_form($id_pertandingan)
    {
        $this->db->where('id_pertandingan', $id_pertandingan);
        $pertandingan = $this->db->get("pertandingan")->row();
        $data = [
          'pertandingan' => $pertandingan
        ];

        $this->load->view('header');
        $this->load->view('pertandingan/formPertandinganEdit', $data);
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

    public function hapus_pertandingan_action($id_pertandingan)
    {
        $data_pertandingan = $this->PertandinganModel->get_by_id($id_pertandingan);
        if ($data_pertandingan) {
          $this->PertandinganModel->hapus_pertandingan($id_pertandingan);
          $this->session->set_flashdata("flash_message", "Berhasil hapus data Pertandingan.");
          redirect(site_url("ControllerPertandingan"));
        } else {
          $this->session->set_flashdata("error_message", "Gagal hapus data Pertandingan.");
          redirect(site_url("ControllerPertandingan"));
        }
    }
}
