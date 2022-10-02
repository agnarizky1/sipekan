<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_driver');
        $this->load->model('M_pesanan');
        $this->load->model('M_kendaraan');
    }

    public function index()
    {
        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Dashboard Admin',
            'driver' => $this->M_driver->count_data(),
            'kendaraan' => $this->M_kendaraan->count_data(),
            'pesanan' => $this->M_pesanan->count_data(),
            'pesanan_selesai' => $this->M_pesanan->count_data_selesai(),

            'kendaraan_xenia' => $this->M_kendaraan->count_xenia(),
            'kendaraan_avanza' => $this->M_kendaraan->count_avanza(),
            'kendaraan_chevrolet' => $this->M_kendaraan->count_chevrolet(),
            'kendaraan_rx8' => $this->M_kendaraan->count_rx8(),
            'kendaraan_gtr' => $this->M_kendaraan->count_gtr(),
        );

        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
