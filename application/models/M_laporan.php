<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('DAY(pesanan.tanggal)', $tanggal);
        $this->db->where('MONTH(pesanan.tanggal)', $bulan);
        $this->db->where('YEAR(pesanan.tanggal)', $tahun);
        $this->db->where('keberangkatan=2');
        return $this->db->get()->result();
    }
    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('MONTH(pesanan.tanggal)', $bulan);
        $this->db->where('YEAR(pesanan.tanggal)', $tahun);
        $this->db->where('keberangkatan=2');
        return $this->db->get()->result();
    }
    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->where('YEAR(pesanan.tanggal)', $tahun);
        $this->db->where('keberangkatan=2');
        return $this->db->get()->result();
    }
    public function getPesanan()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('driver', 'driver.id_driver = pesanan.driver_id', 'left');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.kendaraan_id', 'left');
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get()->result_array();
    }
}
