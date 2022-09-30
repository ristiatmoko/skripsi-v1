<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKlasifikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('KlasifikasiModel');
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
        echo $this->KlasifikasiModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('klasifikasi/listKlasifikasi');
        $this->load->view('footer');
    }

    public function insert_klasifikasi()
    {
        $data = [
            'aksi'              => 'tambah',
            'action'            => site_url("controllerKlasifikasi/insert_klasifikasi_action"),
            'id_klasifikasi'    => set_value("id_klasifikasi"),
            'nis'               => set_value("nis"),
            'listSiswa'         => $this->KlasifikasiModel->get_all_siswa(),
            'listKriteria'      => $this->KlasifikasiModel->get_all_kriteria(),
        ];
        $this->load->view('header');
        $this->load->view('klasifikasi/formKlasifikasi', $data);
        $this->load->view('footer');
    }

    public function insert_klasifikasi_action()
    {
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('absensi', 'absensi', 'required');
        $this->form_validation->set_rules('penghasilan_ortu', 'penghasilan_ortu', 'required');
        $this->form_validation->set_rules('nilai_rapot', 'nilai_rapot', 'required');
        $this->form_validation->set_rules('prestasi', 'prestasi', 'required');
        $this->form_validation->set_rules('hasil_tes', 'hasil_tes', 'required');
        $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->insert_klasifikasi();
        } else {

            $data = [
                'nis'               => $this->input->post("nis"),
                'absensi'           => $this->input->post("absensi"),
                'penghasilan_ortu'  => $this->input->post("penghasilan_ortu"),
                'nilai_rapot'       => $this->input->post("nilai_rapot"),
                'prestasi'          => $this->input->post("prestasi"),
                'hasil_tes'         => $this->input->post("hasil_tes"),
            ];

            $this->KlasifikasiModel->insert_klasifikasi($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data klasifikasi.");
            redirect(site_url("controllerKlasifikasi"));
        }
    }

    public function hapus_klasifikasi($id)
    {
        $data = $this->KlasifikasiModel->get_by_id($id);

        if ($data) {
            $this->KlasifikasiModel->delete_klasifikasi($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data klasifikasi.");
            redirect(site_url("controllerKlasifikasi"));

        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data klasifikasi.");
            redirect(site_url("controllerKlasifikasi"));

        }
    }
}
