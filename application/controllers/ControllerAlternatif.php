<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAlternatif extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('AlternatifModel');
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
        echo $this->AlternatifModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('alternatif/listAlternatif');
        $this->load->view('footer');
    }

    public function insert_alternatif()
    {
        $data = [
            'aksi'                  => 'tambah',
            'action'                => site_url("ControllerAlternatif/insert_alternatif_action"),
            'id_alternatif'         => set_value("id_alternatif"),
            'jurusan'               => set_value("jurusan"),
            'kode_jurusan'          => set_value("kode_jurusan"),
        ];
        $this->load->view('header');
        $this->load->view('alternatif/formAlternatif', $data);
        $this->load->view('footer');
    }

    public function insert_alternatif_action()
    {
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required');
        $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->insert_alternatif();
        } else {

            $data = [
                'kode_jurusan'  => $this->input->post("kode_jurusan"),
                'jurusan'       => $this->input->post("jurusan"),
            ];

            $this->AlternatifModel->insert_alternatif($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data alternatif.");
            redirect(site_url("ControllerAlternatif"));
        }
    }

    public function edit_alternatif($id)
    {
        $data_alternatif = $this->AlternatifModel->get_by_id($id);
        $data = [
            'action'                => site_url("ControllerAlternatif/edit_alternatif_action"),
            'id_alternatif'         => set_value("id_alternatif", $data_alternatif->id_alternatif),
            'kode_jurusan'          => set_value("kode_jurusan", $data_alternatif->kode_jurusan),
            'jurusan'               => set_value("jurusan", $data_alternatif->jurusan),
        ];
        $this->load->view('header');
        $this->load->view('alternatif/formAlternatif', $data);
        $this->load->view('footer');
    }

    public function edit_alternatif_action()
    {
        $id_alternatif  = $this->input->post("id_alternatif");

        $data = [
            'kode_jurusan'     => $this->input->post("kode_jurusan"),
            'jurusan'          => $this->input->post("jurusan"),
        ];

        $this->AlternatifModel->update_alternatif($id_alternatif, $data);

        $this->session->set_flashdata("flash_message", "Berhasil update data alternatif.");
        redirect(site_url("ControllerAlternatif"));
    }

    public function hapus_alternatif($id)
    {
        $data_alternatif = $this->AlternatifModel->get_by_id($id);

        if ($data_alternatif) {
            $this->AlternatifModel->delete_alternatif($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data alternatif.");
            redirect(site_url("ControllerAlternatif"));

        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data alternatif.");
            redirect(site_url("ControllerAlternatif"));

        }
    }
}
