<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSubKriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('SubKriteriaModel');
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
        echo $this->SubKriteriaModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('sub_kriteria/listSubKriteria');
        $this->load->view('footer');
    }

    public function insert_sub_kriteria()
    {
        $data = [
            'aksi'                  => 'tambah',
            'action'                => site_url("ControllerSubKriteria/insert_sub_kriteria_action"),
            'id_sub_kriteria'       => set_value("id_sub_kriteria"),
            'kode_jurusan'          => set_value("kode_jurusan"),
            'c1'                    => set_value("c1"),
            'c2'                    => set_value("c2"),
            'c3'                    => set_value("c3"),
            'c4'                    => set_value("c4"),
            'allJurusan'            => $this->SubKriteriaModel->allJurusan(),
            'allBobot'              => $this->SubKriteriaModel->allBobot(),
        ];
        $this->load->view('header');
        $this->load->view('sub_kriteria/formSubKriteria', $data);
        $this->load->view('footer');
    }

    public function insert_sub_kriteria_action()
    {
        $this->form_validation->set_rules('kode_jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('c1', 'C1', 'required');
        $this->form_validation->set_rules('c2', 'C2', 'required');
        $this->form_validation->set_rules('c3', 'C3', 'required');
        $this->form_validation->set_rules('c4', 'C4', 'required');
        $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->insert_sub_kriteria();
        } else {

            $cek_jurusan = $this->SubKriteriaModel->get_by_id($this->input->post("kode_jurusan"));

            if ($cek_jurusan) {
                $this->session->set_flashdata("error_message", "Gagal tambah sub kriteria. Jurusan sudah ada");
                redirect(site_url("ControllerSubKriteria"));
            }

            $data = [
                'kode_jurusan'  => $this->input->post("kode_jurusan"),
                'c1'            => $this->input->post("c1"),
                'c2'            => $this->input->post("c2"),
                'c3'            => $this->input->post("c3"),
                'c4'            => $this->input->post("c4"),
            ];

            $this->SubKriteriaModel->insert($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data siswa.");
            redirect(site_url("ControllerSubKriteria"));
        }
    }

    public function edit_sub_kriteria($id)
    {
        $data_sub_kriteria = $this->SubKriteriaModel->get_by_id($id);
        $data = [
            'aksi'              => 'edit',
            'action'            => site_url("ControllerSubKriteria/edit_sub_kriteria_action"),
            'id_sub_kriteria'   => set_value("id_sub_kriteria", $data_sub_kriteria->id_sub_kriteria),
            'kode_jurusan'      => set_value("kode_jurusan", $data_sub_kriteria->kode_jurusan),
            'c1'                => set_value("c1", $data_sub_kriteria->c1),
            'c2'                => set_value("c2", $data_sub_kriteria->c2),
            'c3'                => set_value("c3", $data_sub_kriteria->c3),
            'c4'                => set_value("c4", $data_sub_kriteria->c4),
            'allJurusan'        => $this->SubKriteriaModel->allJurusan(),
            'allBobot'          => $this->SubKriteriaModel->allBobot(),
        ];
        $this->load->view('header');
        $this->load->view('sub_kriteria/formSubKriteria', $data);
        $this->load->view('footer');
    }

    public function edit_sub_kriteria_action()
    {
        $id_sub_kriteria  = $this->input->post("id_sub_kriteria");

        $data = [
            'c1'            => $this->input->post("c1"),
            'c2'            => $this->input->post("c2"),
            'c3'            => $this->input->post("c3"),
            'c4'            => $this->input->post("c4"),
        ];

        $this->SubKriteriaModel->update($id_sub_kriteria, $data);

        $this->session->set_flashdata("flash_message", "Berhasil update data sub kriteria.");
        redirect(site_url("ControllerSubKriteria"));
    }

    public function hapus_sub_kriteria($id)
    {
        $data = $this->SubKriteriaModel->get_by_id($id);
        if ($data) {
            $this->SubKriteriaModel->delete($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data sub kriteria..");
            redirect(site_url("ControllerSubKriteria"));

        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data sub kriteria..");
            redirect(site_url("ControllerSubKriteria"));

        }
    }
}
