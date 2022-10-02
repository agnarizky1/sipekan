<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_driver extends CI_Model
{
    public function getDriver()
    {
        $this->db->select('*');
        $this->db->from('driver');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = driver.kendaraan_id', 'left');
        $this->db->order_by('id_driver', 'desc');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('driver', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_driver', $data['id_driver']);
        $this->db->update('driver', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_driver', $data['id_driver']);
        $this->db->delete('driver', $data);
    }
    public function count_data()
    {
        $this->db->select('*');
        $this->db->from('driver');
        return $this->db->get()->num_rows();
    }
}
