<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_pesanan');
    }

    public function index()
    {
        $data = array(
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Pesanan',
            'pesanan' => $this->M_pesanan->getPesanan(),
            'kendaraan' => $this->M_pesanan->getKendaraan(),
            'diproses' => $this->M_pesanan->getDiproses(),
            'selesai' => $this->M_pesanan->getSelesai(),
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $this->form_validation->set_rules(
            'customer',
            'Customer',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'no_hp',
            'no_hp',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'tanggal',
            'tanggal',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'driver_id',
            'driver_id',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'kendaraan_id',
            'kendaraan_id',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $kendaraan_id = $this->input->post('kendaraan_id');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['title'] = 'Form Tambah Pesanan';
            $data['kendaraan'] = $this->M_pesanan->getKendaraan();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesanan/pesanan_add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'customer' => $this->input->post('customer'),
                'no_hp' => $this->input->post('no_hp'),
                'tanggal' => $this->input->post('tanggal'),
                'driver_id' => $this->input->post('driver_id'),
                'kendaraan_id' => $kendaraan_id,
                'keberangkatan' => 0,
            );
            $this->M_pesanan->add($data);

            $this->db->set('status', 1);
            $this->db->where('id_kendaraan', $kendaraan_id);
            $this->db->update('kendaraan');

            $this->session->set_flashdata('pesan', 'Berhasil Menambah Data !');
            redirect('Pesanan');
        }
    }

    public function edit($id_pesanan)
    {
        $this->form_validation->set_rules(
            'customer',
            'Customer',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'no_hp',
            'no_hp',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'tanggal',
            'tanggal',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'driver_id',
            'driver_id',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'kendaraan_id',
            'kendaraan_id',
            'required',
            array('required' => '%s Harus Diisi !')
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Form Edit Pesanan';
            $data['pesanan'] = $this->M_pesanan->get_data($id_pesanan);
            $data['kendaraan'] = $this->db->get('kendaraan')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesanan/pesanan_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'id_pesanan' => $id_pesanan,
                'customer' => $this->input->post('customer'),
                'no_hp' => $this->input->post('no_hp'),
                'tanggal' => $this->input->post('tanggal'),
                'driver_id' => $this->input->post('driver_id'),
                'kendaraan_id' => $this->input->post('kendaraan_id'),
                'keberangkatan' => 0,
            );

            $this->M_pesanan->edit($data);


            $this->session->set_flashdata('pesan', 'Berhasil Mengedit Data !');
            redirect('Pesanan');
        }
    }

    public function delete($id_pesanan)
    {
        $data = [
            'id_pesanan'   => $id_pesanan,
        ];
        $this->M_pesanan->delete($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data !');
        redirect('Pesanan');
    }

    public function getKendaraan()
    {
        $id_kendaraan = $this->input->post('id');
        $data = $this->M_pesanan->getSopirKendaraan($id_kendaraan);
        $output = '<option value">Pilih Kendaraan</ouput>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id_driver . '">' . $row->sopir . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function proses($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'keberangkatan' => '1',
        );
        $this->M_pesanan->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !');
        redirect('Pesanan');
    }
    public function selesai($id_pesanan)
    {
        $kendaraan_id = $this->input->post('id_kendaraan');

        $data = array(
            'id_pesanan' => $id_pesanan,
            'keberangkatan' => '2',
        );
        $this->M_pesanan->update_order($data);

        $this->db->set('status', 0);
        $this->db->where('id_kendaraan', $kendaraan_id);
        $this->db->update('kendaraan');

        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diselesaikan !');
        redirect('Pesanan');
    }
}
