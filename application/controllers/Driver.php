<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_driver');
    }

    public function index()
    {
        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Driver Terdaftar',
            'driver' => $this->M_driver->getDriver(),
            'kendaraan' => $this->db->get('kendaraan')->result(),
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('driver', $data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data = [
            'kendaraan_id'   => $this->input->post('kendaraan_id'),
            'sopir'   => $this->input->post('sopir'),
        ];

        $this->M_driver->add($data);

        $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data !');
        redirect('Driver');
    }

    //Update one item
    public function edit($id = NULL)
    {
        $data = [
            'id_driver'   => $id,
            'kendaraan_id'   => $this->input->post('kendaraan_id'),
            'sopir'   => $this->input->post('sopir'),
        ];
        $this->M_driver->edit($data);

        $this->session->set_flashdata('pesan', 'Berhasil Mengedit Data !');
        redirect('Driver');
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $data = [
            'id_driver'   => $id,
        ];
        $this->M_driver->delete($data);

        $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data !');
        redirect('Driver');
    }
}
