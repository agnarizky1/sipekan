<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{
    public function getPesanan()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('keberangkatan', 0);
        return $this->db->get()->result_array();
    }
    public function getDriver()
    {
        $this->db->select('*');
        $this->db->from('driver');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = driver.kendaraan_id', 'left');
        $this->db->where('status', 0);
        return $this->db->get()->result();
    }
    public function getSopirKendaraan($id_kendaraan)
    {
        return $this->db->get_where('driver', ['kendaraan_id' => $id_kendaraan])->result();
    }
    public function add($data)
    {
        $this->db->insert('pesanan', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->delete('pesanan', $data);
    }
    public function get_data($id_pesanan)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('id_pesanan', $id_pesanan);
        return $this->db->get()->row();
    }
    public function getDiproses()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('keberangkatan', 1);
        return $this->db->get()->result_array();
    }
    public function getSelesai()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('keberangkatan', 2);
        return $this->db->get()->result();
    }
    public function update_order($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
    }
    public function count_data()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('keberangkatan', 0, 1);
        return $this->db->get()->num_rows();
    }
    public function count_data_selesai()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('keberangkatan', 2);
        return $this->db->get()->num_rows();
    }
    public function getKendaraan()
    {
        $this->db->select('*');
        $this->db->from('kendaraan');
        $this->db->join('driver', 'driver.kendaraan_id = kendaraan.id_kendaraan', 'left');
        $this->db->where('status', 0);
        return $this->db->get()->result();
    }
}
