<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kendaraan extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('kendaraan', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_kendaraan', $data['id_kendaraan']);
        $this->db->update('kendaraan', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_kendaraan', $data['id_kendaraan']);
        $this->db->delete('kendaraan', $data);
    }
    public function count_data()
    {
        $this->db->select('*');
        $this->db->from('kendaraan');
        return $this->db->get()->num_rows();
    }
    public function count_xenia()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('kendaraan_id', 1);
        return $this->db->get()->num_rows();
    }
    public function count_avanza()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('kendaraan_id', 2);
        return $this->db->get()->num_rows();
    }
    public function count_chevrolet()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('kendaraan_id', 5);
        return $this->db->get()->num_rows();
    }
    public function count_rx8()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('kendaraan_id', 6);
        return $this->db->get()->num_rows();
    }
    public function count_gtr()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('kendaraan_id', 7);
        return $this->db->get()->num_rows();
    }
}
