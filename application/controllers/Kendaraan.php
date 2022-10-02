<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_kendaraan');
    }

    public function index()
    {
        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Kendaraan Terdaftar',
            'kendaraan' => $this->db->get('kendaraan')->result(),
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kendaraan', $data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data = [
            'mobil'   => $this->input->post('mobil'),
            'plat_nomor'   => $this->input->post('plat_nomor'),
            'status'   => 0,
        ];

        $this->M_kendaraan->add($data);

        $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data !');
        redirect('Kendaraan');
    }

    //Update one item
    public function edit($id = NULL)
    {
        $data = [
            'id_kendaraan'   => $id,
            'mobil'   => $this->input->post('mobil'),
            'plat_nomor'   => $this->input->post('plat_nomor'),
            'status'   => 0,
        ];
        $this->M_kendaraan->edit($data);

        $this->session->set_flashdata('pesan', 'Berhasil Mengedit Data !');
        redirect('Kendaraan');
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $data = [
            'id_kendaraan'   => $id,
        ];
        $this->M_kendaraan->delete($data);

        $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data !');
        redirect('Kendaraan');
    }
}
