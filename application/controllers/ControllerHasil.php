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
        if (empty($this->session->session_login['username'])) {
            $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
            redirect(site_url("controllerLogin"));
        }
    }

    public function index()
    {
        // print_r($this->session->userdata());die;
        $nisn = NULL;
        $data = [
            'allSiswa'  => $this->HasilModel->allSiswa(),
            'nilaiS'    => $this->HasilModel->get_proses_hitung($nisn)

        ];
        $this->load->view('header');
        $this->load->view('hasil/listHasil', $data);
        $this->load->view('footer');
    }


    public function prosesHitung()
    {
        $nisn       = (int) $this->input->post("nisn");
        $gol        = (int) $this->input->post("c_gol");
        $assist     = (int) $this->input->post("c_assist");
        $main        = (int) $this->input->post("c_main");
        $kartu_merah        = (int) $this->input->post("kartu_merah");
        $kartu_kuning        = (int) $this->input->post("kartu_kuning");
        $motm        = (int) $this->input->post("motm");
        // dd($this->input->post());
        // $allSubKriteria = $this->db->get("sub_kriteria")->result();
        $allStatistik = $this->db->get("statistik")->result();
        // dd($allStatistik);
        foreach ($allStatistik as $value) {
        //     $w1 = round($value->c1 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
        //     $w2 = round($value->c2 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
        //     $w3 = round($value->c3 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
        //     $w4 = round($value->c4 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
            $nilai_s = round((pow($gol, 0.35) * pow($assist, 0.25) * pow($main, 0.1) * pow($kartu_merah, -0.15) * pow($kartu_kuning, -0.1) * pow($motm, -0.05)), 2);
            // dd($nilai_s);
            $data = [
                'nisn'          => $nisn,
                // 'kode_jurusan'  => $value->kode_jurusan,
                // 'w1'            => $w1,
                // 'w2'            => $w2,
                // 'w3'            => $w3,
                // 'w4'            => $w4,
                's'             => $nilai_s,
            ];

            // "kode_jurusan" => $value->kode_jurusan

            $cekDataProses = $this->db->get_where("proses_hitung", ["nisn" => $nisn, ])->row();
            if ($cekDataProses) {
                $this->db->where("nisn", $nisn);
                // $this->db->where("kode_jurusan", $value->kode_jurusan);
                $this->db->update("proses_hitung", $data);
            } else {
                $this->db->insert("proses_hitung", $data);
            }
        }

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
        redirect(site_url('ControllerHasil'));
    }   

    public function hitung_nilai_v() {
        $nisn       = $this->input->post("nisn");

        $data_hitung = $this->HasilModel->get_proses_hitung($nisn);
        // print_r($data_hitung);die;
        foreach ($data_hitung as $value) {
            $get_total_s = $this->db->query("SELECT SUM(s) AS total_s FROM proses_hitung")->result();
            foreach ($get_total_s as $nilai) {
                $data_v = [
                    'v' => round(($value->s / $nilai->total_s), 9)
                ];
                // print_r($nilai->kode_jurusan. ":". $nilai->total_s. " ");
                $this->db->where("nisn", $value->nisn);
                $this->db->where("kode_jurusan", $value->kode_jurusan);
                $this->db->update("proses_hitung", $data_v);
            }
        }

        $data_session = [
            'nisn'          => $nisn,
        ];
        $this->session->set_userdata("data_siswa", $data_session);
        redirect(site_url('ControllerHasil'));

    }

    public function simpanHitung()
    {
        $nisn = $this->input->post("nisn_hasil");
        $rekomendasi_jurusan = $this->input->post("jurusan");

        $data = [
            'nisn'                => $nisn,
            'rekomendasi_jurusan' => $rekomendasi_jurusan,
            'tanggal'             => date('Y-m-d H:i:s')
        ];

        $cek_nisn = $this->db->get_where("hasil", ["nisn" => $nisn])->row();
        if($cek_nisn) {
            $this->db->where("nisn", $nisn);
            $this->db->update("hasil", $data);
        } else {
            $this->db->insert("hasil", $data);
        }

        redirect(site_url('ControllerHasil'));
    }
}
