<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPemain extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('PemainModel');
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
        // header('Content-Type: application/json');
        // return $this->StatistikModel->json();

        return $this->PemainModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('pemain/listPemain', ['pemains' => $this->json()]);
        $this->load->view('footer');
    }

    public function insert_pemain()
    {   
        
        $this->load->view('header');
        $this->load->view('pemain/formPemain');
        $this->load->view('footer');
    }

    public function insert_pemain_action()
    {
        $data = [
            'no_punggung'   => $this->input->post("no_punggung"),
            'nama_lengkap'  => $this->input->post("nama_lengkap"),
            'posisi'        => $this->input->post("posisi"),
            'tinggi_badan'  => $this->input->post("tinggi_badan"),
            'berat_badan'   => $this->input->post("berat_badan"),
            'umur'          => $this->input->post("umur"),
  
          ];
  
          $this->PemainModel->insert_pemain($data);
  
          $this->session->set_flashdata("flash_message", "Berhasil tambah data musim.");
          redirect(site_url("ControllerPemain"));
       
    }

    public function statistik_pemain($nisn)
    {
        $this->load->view('header');
        $this->load->view('siswa/statistikPemain');
        $this->load->view('footer');
    }

    public function edit_pemain($id_pemain)
    {
        
        $this->db->where('id_pemain', $id_pemain);
        $pemain = $this->db->get("pemain")->row();
        $data = [
            'pemain' => $pemain
        ];

        $this->load->view('header');
        $this->load->view('pemain/formEditPemain', $data);
        $this->load->view('footer');
    }

    public function edit_pemain_action($id_pemain)
    {
        // $nisn  = $this->input->post("nisn");

        $data = [
            'no_punggung'   => $this->input->post("no_punggung"),
            'nama_lengkap'  => $this->input->post("nama_lengkap"),
            'posisi'        => $this->input->post("posisi"),
            'tinggi_badan'  => $this->input->post("tinggi_badan"),
            'berat_badan'   => $this->input->post("berat_badan"),
            'umur'          => $this->input->post("umur"),
  
        ];

        $this->PemainModel->update_pemain($id_pemain, $data);


        $this->session->set_flashdata("flash_message", "Berhasil update data siswa.");
        redirect(site_url("ControllerPemain"));
    }

    public function hapus_pemain($id_pemain)
    {
        $data_pemain = $this->PemainModel->get_by_id($id_pemain);
        if ($data_pemain) {
            $this->PemainModel->delete_pemain($id_pemain);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data Pemain.");
            redirect(site_url("ControllerPemain"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data Pemain.");
            redirect(site_url("ControllerPemain"));
        }
    }
}
