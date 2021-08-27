<?php

class Crud_model extends CI_Model
{
    public function convert_date($format, $tgl)
    {
        # code...
        return date($format, strtotime($tgl));

    }

    public function rupiah($angka)
    {
        # code...
        $result = number_format($angka, 0, ".", ",");
        return $result;
    }

    public function kode($max, $tabel, $huruf)
    {
        # code...
        $this->db->select_max($max);
        $data = $this->db->get($tabel)->row_array();
        $max_kode = $data[$max];
        $urutan = (int) substr($max_kode, 3, 3);
        $urutan++;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }

    public function add($tabel, $data)
    {
        # code...
        $this->db->insert($tabel, $data);
    }

    public function show($tabel, $whereClause = '')
    {
        # code...
        if (empty($whereClause)) {
            return $this->db->get($tabel)->result_array();
        } else {
            return $this->db->get_where($tabel, $whereClause)->result_array();
        }
    }

    public function show_row($tabel, $whereClause = '')
    {
        # code...
        return $this->db->get_where($tabel, $whereClause)->row_array();
    }

    public function show_field($tabel, $field, $whereClause = '')
    {
        # code...
        $this->db->select($field);
        if (!empty($whereClause)) {
            return $this->db->get_where($tabel, $whereClause)->row_array();
        } else {
            return $this->db->get($tabel)->result_array();
        }
    }

    public function lap_pembelian($whereClause = '', $rowResult = false, $limit = '')
    {
        # code...
        $this->db->select('pembelian.*, supplier.*, barang.nama_barang, barang.unit');
        $this->db->from('pembelian');
        $this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supplier');
        $this->db->join('barang', 'barang.id_barang = pembelian.id_barang');
        $this->db->order_by('pembelian.tanggal', 'DESC');
        if (!empty($whereClause)) {
            $this->db->where($whereClause);
        }

        if (!empty($limit)) {
            $this->db->limit($limit);
        }

        if ($rowResult == true) {
            return $this->db->get()->row_array();
        } else {
            return $this->db->get()->result_array();
        }

    }

    public function lap_penjualan($whereClause = '', $rowResult = false, $limit = '')
    {
        # code...
        $this->db->select('penjualan.*, customer.*, barang.nama_barang, barang.unit, barang.harga_beli, barang.harga_jual');
        $this->db->from('penjualan');
        $this->db->join('customer', 'customer.id_customer = penjualan.id_customer');
        $this->db->join('barang', 'barang.id_barang = penjualan.id_barang');
        $this->db->order_by('penjualan.no_penjualan', 'DESC');
        if (!empty($whereClause)) {
            $this->db->where($whereClause);
        }
        if (!empty($limit)) {
            $this->db->limit($limit);
        }

        if ($rowResult == true) {
            return $this->db->get()->row_array();
        } else {
            return $this->db->get()->result_array();
        }

    }

    public function update($tabel, $data = null, $whereClause, $setKey = null, $setVal = null, $escape = false)
    {
        # code...
        if ($setKey != null && $setVal != null) {
            $this->db->set($setKey, $setVal, false);
            $this->db->where($whereClause);
            $this->db->update($tabel);
        } else {
            $this->db->update($tabel, $data, $whereClause);
        }
    }

    public function del($tabel, $whereClause)
    {
        # code...
        return $this->db->delete($tabel, $whereClause);
    }

    public function sum($tabel, $whereClause = '')
    {
        # code...
        // $this->db->select('COUNT(*)');
        if (!empty($whereClause)) {
            return $this->db->get_where($tabel, $whereClause)->num_rows();
        } else {
            return $this->db->get($tabel)->num_rows();
        }
    }
}
