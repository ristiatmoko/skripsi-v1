<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSiswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('SiswaModel');
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
        echo $this->SiswaModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('siswa/listSiswa');
        $this->load->view('footer');
    }

    public function insert_siswa()
    {
        $data = [
            'aksi'          => 'tambah',
            'action'        => site_url("controllerSiswa/insert_siswa_action"),
            'nisn'          => set_value("nisn"),
            'nama_lengkap'  => set_value("nama_lengkap"),
            'tanggal_lahir' => set_value("tanggal_lahir"),
            'jenis_kelamin' => set_value("jenis_kelamin"),
            'alamat'        => set_value("alamat"),
            'asal_sekolah'  => set_value("asal_sekolah"),
        ];
        $this->load->view('header');
        $this->load->view('siswa/formSiswa', $data);
        $this->load->view('footer');
    }

    public function insert_siswa_action()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->insert_siswa();
        } else {

            $cek_nis_siswa = $this->SiswaModel->get_by_id($this->input->post("nisn"));

            if ($cek_nis_siswa) {
                $this->session->set_flashdata("error_message", "Gagal tambah siswa. NIS sudah ada, atas nama " . $cek_nis_siswa->nama_lengkap);
                redirect(site_url("controllerSiswa"));
            }

            $data = [
                'nisn'            => $this->input->post("nisn"),
                'nama_lengkap'    => $this->input->post("nama_lengkap"),
                'tanggal_lahir'   => date('Y-m-d', strtotime($this->input->post("tanggal_lahir"))),
                'jenis_kelamin'   => $this->input->post("jenis_kelamin"),
                'alamat'          => $this->input->post("alamat"),
                'asal_sekolah'    => $this->input->post("asal_sekolah"),
            ];

            $this->SiswaModel->insert_siswa($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data siswa.");
            redirect(site_url("controllerSiswa"));
        }
    }

    public function edit_siswa($nisn)
    {
        $data_siswa = $this->SiswaModel->get_by_id($nisn);
        $data = [
            'aksi'          => 'edit',
            'action'        => site_url("controllerSiswa/edit_siswa_action"),
            'nisn'           => set_value("nisn", $data_siswa->nisn),
            'nama_lengkap'  => set_value("nama_lengkap", $data_siswa->nama_lengkap),
            'tanggal_lahir' => set_value("tanggal_lahir", $data_siswa->tanggal_lahir),
            'jenis_kelamin' => set_value("jenis_kelamin", $data_siswa->jenis_kelamin),
            'alamat'        => set_value("alamat", $data_siswa->alamat),
            'asal_sekolah'  => set_value("alamat", $data_siswa->asal_sekolah),
        ];
        $this->load->view('header');
        $this->load->view('siswa/formSiswa', $data);
        $this->load->view('footer');
    }

    public function edit_siswa_action()
    {
        $nisn  = $this->input->post("nisn");

        $data = [
            'nama_lengkap'    => $this->input->post("nama_lengkap"),
            'tanggal_lahir'   => date('Y-m-d', strtotime($this->input->post("tanggal_lahir"))),
            'jenis_kelamin'   => $this->input->post("jenis_kelamin"),
            'alamat'          => $this->input->post("alamat"),
            'asal_sekolah'    => $this->input->post("asal_sekolah"),
        ];

        $this->SiswaModel->update_siswa($nisn, $data);


        $this->session->set_flashdata("flash_message", "Berhasil update data siswa.");
        redirect(site_url("controllerSiswa"));
    }

    public function hapus_siswa($nisn)
    {
        $data_siswa = $this->SiswaModel->get_by_id($nisn);
        if ($data_siswa) {
            $this->SiswaModel->delete_siswa($nisn);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data siswa.");
            redirect(site_url("controllerSiswa"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data siswa.");
            redirect(site_url("controllerSiswa"));
        }
    }
}
