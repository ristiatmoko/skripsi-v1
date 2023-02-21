<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerLogin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('LoginModel');
    }

    // public function index()
    // {
    //     if (empty($this->session->userdata("username"))) {
    //         $this->load->view("viewLogin");
    //     } else {
    //         redirect("ControllerHome"); 
    //     }
    // }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        // $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == false) {
            if (empty($this->session->userdata("username"))) {
                $this->load->view("viewLogin");
            } else {
                redirect("ControllerHome"); 
            }
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user  = $this->db->get_where('user', ['username' => $username])->row_array();
        if($user) {
            if($user['is_active'] == 1) {
                if($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('ControllerHome');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah</div>');
                    redirect('ControllerLogin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username Tidak Aktif</div>');
                redirect('ControllerLogin');
            }
        } else {
           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username salah</div>');
           redirect('ControllerLogin');
        }
    }
 

    public function admin()
    {
        $this->load->view("header");
        $this->load->view("admin");
        $this->load->view("footer");
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
            redirect("ControllerHome");
        }
    }

    public function logout()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Logout Berhasil</div>');
        
        redirect("ControllerLogin");
    }
}
