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
        if (empty($this->session->session_login['username'])) {
            $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
            redirect(site_url("controllerLogin"));
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
        // $slug = url_title(set_value("nisn"), '-', true);
        // $data = [
        //     'aksi'          => 'tambah',
        //     'action'        => site_url("controllerSiswa/insert_siswa_action"),
        //     'slug'          => $slug,
        //     'nisn'          => set_value("nisn"),
        //     'nama_lengkap'  => set_value("nama_lengkap"),
        //     'jenis_kelamin' => set_value("jenis_kelamin"),
        //     'tinggi_badan'  => set_value("tinggi_badan"),
        //     'berat_badan'   => set_value("berat_badan"),
        //     'umur'          => set_value("umur"),
        // ];
        $this->load->view('header');
        $this->load->view('pemain/formpemain');
        $this->load->view('footer');
    }

    public function insert_pemain_action()
    {
        // $this->form_validation->set_rules('nisn', 'NISN', 'required');
        // $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required');
        // $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required');
        // $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required');
        // $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required');
        // $this->form_validation->set_rules('umur', 'Umur', 'required');
        // $this->form_validation->set_message('required', '* {field} Harus diisi');

        $data = [
            // 'allMusim'  => $this->HasilModel->allMusim(),
            // 'id_pertandingan' => $this->input->post("id_pertandingan"),
            'no_punggung'   => $this->input->post("no_punggung"),
            'nama_lengkap'  => $this->input->post("nama_lengkap"),
            'posisi'        => $this->input->post("posisi"),
            'tinggi_badan'  => $this->input->post("tinggi_badan"),
            'berat_badan'   => $this->input->post("berat_badan"),
            'umur'          => $this->input->post("umur"),
  
          ];
  
        //   dd($data);
  
          $this->PemainModel->insert_pemain($data);
  
          $this->session->set_flashdata("flash_message", "Berhasil tambah data musim.");
          redirect(site_url("ControllerPemain"));
        // if ($this->form_validation->run() == FALSE) {
        //     $this->insert_siswa();
        // } else {

        //     $cek_nis_siswa = $this->SiswaModel->get_by_id($this->input->post("nisn"));

        //     if ($cek_nis_siswa) {
        //         $this->session->set_flashdata("error_message", "Gagal tambah siswa. NIS sudah ada, atas nama " . $cek_nis_siswa->nama_lengkap);
        //         redirect(site_url("controllerSiswa"));
        //     }

        //     $data = [
        //         'nisn'              => $this->input->post("nisn"),
        //         'nama_lengkap'      => $this->input->post("nama_lengkap"),
        //         // 'tanggal_lahir'   => date('Y-m-d', strtotime($this->input->post("tanggal_lahir"))),
        //         'jenis_kelamin'     => $this->input->post("jenis_kelamin"),
        //         'tinggi_badan'      => $this->input->post("tinggi_badan"),
        //         'berat_badan'       => $this->input->post("berat_badan"),
        //         'umur'              => $this->input->post("umur"),
        //     ];

        //     $this->SiswaModel->insert_siswa($data);

        //     $this->session->set_flashdata("flash_message", "Berhasil tambah data siswa.");
        //     redirect(site_url("controllerSiswa"));
        // }
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
            redirect(site_url("controllerPemain"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data Pemain.");
            redirect(site_url("controllerPemain"));
        }
    }
}
