<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBobot extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('BobotModel');
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
        echo $this->BobotModel->json();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('bobot/listBobot');
        $this->load->view('footer');
    }

    public function insert_bobot()
    {
        $data = [
            'aksi'                  => 'tambah',
            'action'                => site_url("controllerBobot/insert_bobot_action"),
            'id_bobot'              => set_value("id_bobot"),
            'tingkat_kepentingan'   => set_value("tingkat_kepentingan"),
            'nilai_bobot'           => set_value("nilai_bobot"),
        ];
        $this->load->view('header');
        $this->load->view('bobot/formBobot', $data);
        $this->load->view('footer');
    }

    public function insert_bobot_action()
    {
        $this->form_validation->set_rules('tingkat_kepentingan', 'tingkat_kepentingan', 'required');
        $this->form_validation->set_rules('nilai_bobot', 'nilai_bobot', 'required');
        $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->insert_bobot();
        } else {

            $data = [
                'tingkat_kepentingan'  => $this->input->post("tingkat_kepentingan"),
                'nilai_bobot'          => $this->input->post("nilai_bobot"),
            ];

            $this->BobotModel->insert_bobot($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data bobot.");
            redirect(site_url("controllerBobot"));
        }
    }

    public function edit_bobot($id)
    {
        $data_bobot = $this->BobotModel->get_by_id($id);
        $data = [
            'action'                => site_url("controllerBobot/edit_bobot_action"),
            'id_bobot'              => set_value("id_bobot", $data_bobot->id_bobot),
            'tingkat_kepentingan'   => set_value("tingkat_kepentingan", $data_bobot->tingkat_kepentingan),
            'nilai_bobot'           => set_value("nilai_bobot", $data_bobot->nilai_bobot),
        ];
        $this->load->view('header');
        $this->load->view('bobot/formBobot', $data);
        $this->load->view('footer');
    }

    public function edit_bobot_action()
    {
        $id_bobot  = $this->input->post("id_bobot");

        $data = [
            'tingkat_kepentingan'  => $this->input->post("tingkat_kepentingan"),
            'nilai_bobot'          => $this->input->post("nilai_bobot"),
        ];

        $this->BobotModel->update_bobot($id_bobot, $data);

        $this->session->set_flashdata("flash_message", "Berhasil update data bobot.");
        redirect(site_url("controllerBobot"));
    }

    public function hapus_bobot($id)
    {
        $data_bobot = $this->BobotModel->get_by_id($id);

        if ($data_bobot) {
            $this->BobotModel->delete_bobot($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data bobot.");
            redirect(site_url("controllerBobot"));

        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data bobot.");
            redirect(site_url("controllerBobot"));

        }
    }
}
