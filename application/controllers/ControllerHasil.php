<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerHasil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('HasilModel');
        $this->load->library('form_validation');
        $this->load->library('Datatables');
        $this->load->helper(array('form', 'url', 'download', 'file'));
        if (empty($this->session->userdata('username'))) {
            $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
            redirect(site_url("ControllerLogin"));
        }
    }

   
    public function index()
    {
        // print_r($this->session->userdata());die;
        $id_pemain = NULL;
        $data = [
            'allPemain' => $this->HasilModel->allPemain(),
            'nilaiS'    => $this->HasilModel->get_proses_hitung($id_pemain)

        ];

        $this->load->view('header');
        $this->load->view('hasil/listHasil', $data);
        $this->load->view('footer');
    }


    public function prosesHitung()
    {
        $id_pemain      = (int) $this->input->post("id_pemain");
        $gol            = (int) $this->input->post("c_gol");
        $assist         = (int) $this->input->post("c_assist");
        $save           = (int) $this->input->post("c_save");
        $clean          = (int) $this->input->post("c_clean");
        $main           = (int) $this->input->post("c_main");
        $kartu_merah    = (int) $this->input->post("c_kartu_merah");
        $kartu_kuning   = (int) $this->input->post("c_kartu_kuning");
        $bunuh_diri     = (int) $this->input->post("c_bunuh_diri");


        $arrayInput = [];
        if($gol != 0){
            array_push($arrayInput, [$gol, 0.25]);
        }
        if($assist != 0){
            array_push($arrayInput, [$assist, 0.2]);
        }
        if($save != 0){
            array_push($arrayInput, [$save, 0.1]);
        }
        if($clean != 0){
            array_push($arrayInput, [$clean, 0.1]);
        }
        if($main != 0){
            array_push($arrayInput, [$main, 0.1]);
        }
        if($kartu_merah != 0){
            array_push($arrayInput, [$kartu_merah, -0.1]);
        }
        if($kartu_kuning != 0){
            array_push($arrayInput, [$kartu_kuning, -0.05]);
        }
        if($bunuh_diri != 0){
            array_push($arrayInput, [$bunuh_diri, -0.1]);
        }

        // dd($arrayInput);
        $total = 1;
        foreach($arrayInput as $ai){
            $total *= pow($ai[0], $ai[1]);
        }

        // dd(round($total, 2));
        // dd($this->input->post());
        // $allSubKriteria = $this->db->get("sub_kriteria")->result();
        // $allStatistik = $this->db->get("statistik")->result();
        // dd($allStatistik);
        // foreach ($allStatistik as $value) {
        //     $w1 = round($value->c1 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
        //     $w2 = round($value->c2 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
        //     $w3 = round($value->c3 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
        //     $w4 = round($value->c4 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
            // $nilai_s = round((pow($gol, 0.35) * pow($assist, 0.25) * pow($main, 0.1) * pow($kartu_merah, -0.15) * pow($kartu_kuning, -0.1) * pow($motm, -0.05)), 2);
            // dd($nilai_s);
            $data = [
                'id_pemain'     => $id_pemain,
                's'             => round($total, 2)
            ];


            $cekDataProses = $this->db->get_where("proses_hitung", ["id_pemain" => $id_pemain, ])->row();
            if ($cekDataProses) {
                $this->db->where("id_pemain", $id_pemain);
                $this->db->update("proses_hitung", $data);
            } else {
                $this->db->insert("proses_hitung", $data);
            }
        // }

        $data_session = [
            'nilai_s'          => 'ada',
        ];
        $this->session->set_userdata("nilaiS", $data_session);

        redirect(site_url('ControllerHasil'));
    }

    public function sesi_hitung_v() {
        $data_session = [
            'nilai_v'          => 'ada',
        ];
        $this->session->set_userdata("nilaiV", $data_session);
        redirect(site_url('ControllerHasil?step-1'));
    }   

    public function hitung_nilai_v() {
        $id_pemain       = $this->input->post("id_pemain");

        $data_hitung = $this->HasilModel->get_proses_hitung($id_pemain);
        // print_r($data_hitung);die;
        foreach ($data_hitung as $value) {
            $get_total_s = $this->db->query("SELECT SUM(s) AS total_s FROM proses_hitung")->result();
            foreach ($get_total_s as $nilai) {
                $data_v = [
                    'v' => round(($value->s / $nilai->total_s), 9)
                ];
                // print_r($nilai->kode_jurusan. ":". $nilai->total_s. " ");
                $this->db->where("id_pemain", $value->id_pemain);
                $this->db->update("proses_hitung", $data_v);
            }
        }

        $data_session = [
            'id_pemain'          => $id_pemain,
        ];
        $this->session->set_userdata("data_pemain", $data_session);
        redirect(site_url('ControllerHasil'));

    }

 
}
