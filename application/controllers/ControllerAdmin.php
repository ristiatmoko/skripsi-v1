<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata['level'] != 'superadmin') {
            redirect('controllerHome');
        }
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('AdminModel');
    }

    public function json()
    {
        return $this->AdminModel->allUsers();
    }

    public function index()
    {
        // dd($this->json());
        // dd($this->session->userdata['level']);
        $this->load->view('header');
        $this->load->view('admin/admin', ['users' => $this->json()]);
        $this->load->view('footer');
    }

    public function insert()
    {
        $data = [
            'username'      => $this->input->post("username"),
            'password'      => $this->input->post("password"),
            'level'         => "admin",
            'is_active'     => 1,

          ];
  
  
          $this->AdminModel->insert_admin($data);
  
          $this->session->set_flashdata("flash_message", "Berhasil tambah data musim.");
          redirect(site_url("ControllerAdmin"));
    }

    public function edit_admin($id)
    {
        
        $this->db->where('id', $id);
        $user = $this->db->get("user")->row();
        $data = [
            'user' => $user
        ];

        $this->load->view('header');
        $this->load->view('admin/formEditAdmin', $data);
        $this->load->view('footer');
    }

    public function edit_admin_action($id)
    {

        $data = [
            'username'   => $this->input->post("username"),
            'password'  => $this->input->post("password"),
        ];

        $this->AdminModel->update_admin($id, $data);


        $this->session->set_flashdata("flash_message", "Berhasil update data siswa.");
        redirect(site_url("ControllerAdmin"));
    }

    public function hapus_admin($id)
    {
        $data_admin = $this->AdminModel->get_by_id($id);
        if ($data_admin) {
            $this->AdminModel->delete_admin($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data admin.");
            redirect(site_url("controllerAdmin"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data admin.");
            redirect(site_url("controllerAdmin"));
        }
    }
 
    public function ubahPasssword()
    {
        $this->load->view("admin/header");
        $this->load->view('admin/formUbahPassword');
        $this->load->view("admin/footer");
    }

    public function ubahPasssword_action()
    {
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->ubahPasssword();
        } else {
            $username_lama  = $this->input->post("username_lama");
            $username       = $this->input->post("username");
            $password       = md5($this->input->post("password"));

            $data = [
                "username"  => $username,
                "password"  => $password
            ];
            $this->LoginModel->updateUser($username_lama, $data);
            $this->session->set_flashdata("success", "Berhasil ubah password");
            redirect("controllerHome");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("controllerLogin");
    }
}
