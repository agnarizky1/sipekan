<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_laporan');
    }

    public function index()
    {
        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Laporan Pesanan Kendaraan',
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan', $data);
        $this->load->view('templates/footer');
    }
    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Laporan Pesanan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->M_laporan->lap_harian($tanggal, $bulan, $tahun),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_harian', $data);
        $this->load->view('templates/footer');
    }
    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Laporan Pesanan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->M_laporan->lap_bulanan($bulan, $tahun),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_bulanan', $data);
        $this->load->view('templates/footer');
    }
    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Laporan Penjualan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->M_laporan->lap_tahunan($tahun),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_tahunan', $data);
        $this->load->view('templates/footer');
    }

    public function export()
    {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Pesanan_Sipekan.xls");
        $data = $this->M_laporan->getPesanan();

        $isPrintHeader = false;
        foreach ($data as $row) {

            if (!$isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
        exit();
    }
}
