<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('form_validation');
        $this->load->model('Crud_model', 'crud');
        $user = $this->session->userdata('user');
        if (!$user) {
            redirect('auth');
        }
        if ($user['status'] !== 'admin') {
            redirect('cashier');
        }

    }

    public function index()
    {
        # code...
        $data['active'] = 'dash';
        $data['sub_active'] = '';
        $data['sort'] = true;

        $data['barang'] = $this->crud->sum('barang');
        $penjualan = $this->crud->sum('penjualan', ['status' => 'sudah']);
        $pembelian = $this->crud->sum('pembelian');
        $data['transactions'] = $this->crud->rupiah($penjualan + $pembelian);
        $data['customer'] = $this->crud->rupiah($this->crud->sum('customer'));

        $revenue = $this->crud->lap_penjualan(['status' => 'sudah']);
        $data['revenue'] = 0;

        foreach ($revenue as $dt) {
            $untung = (int) $dt['harga_jual'] - (int) $dt['harga_beli'];
            $data['revenue'] += $untung;
        }

        $data['recent'] = $this->crud->lap_penjualan(['status' => 'sudah'], false, 5);

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('dashboard/index.php', $data);
        $this->load->view('templates/footer.php', $data);

    }

    public function add()
    {
        # code...
        $data['active'] = 'bar';
        $data['sub_active'] = '';

        $data['kode'] = $this->crud->kode('id_barang', 'barang', 'BR');

        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|is_unique[barang.nama_barang]');
        $this->form_validation->set_rules('unit', 'Unit', 'required|alpha');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('barang/create.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $val = [
                'id_barang' => $this->input->post('id_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'unit' => $this->input->post('unit'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'tgl_input' => date('Y-m-d'),
                'tgl_update' => '',
            ];
            $this->crud->add('barang', $val);
            $this->session->set_flashdata('success', 'Data Success');
            redirect('barang');
        }

    }
    public function update($id)
    {
        # code...
        $data['active'] = 'bar';
        $data['sub_active'] = '';

        $data['kode'] = $this->crud->kode('id_barang', 'barang', 'BR');
        $data['barang'] = $this->crud->show_row('barang', ['id_barang' => $id]);

        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('barang/edit.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $id_barang = $this->input->post('id_barang');
            $val = [
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'unit' => $this->input->post('unit'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'tgl_update' => date('Y-m-d H:i:s'),
            ];
            $this->crud->update('barang', $val, ['id_barang' => $id_barang]);
            $this->session->set_flashdata('success', 'Data Success');
            redirect('barang');
        }

    }

    public function hapus($id)
    {
        # code...
        $del = $this->crud->del('barang', ['id_barang' => $id]);
        if ($del) {
            $this->session->set_flashdata('success', 'Data Was Deleted');
            redirect('barang');
        } else {
            $this->session->set_flashdata('success', "Data Can't Delete");
            redirect('barang');
        }
    }

    public function get_timer()
    {
        # code...
        $data = $this->crud->show('penjualan');
        $time = $this->crud->convert_date('M d, Y H:i:s', $data[0]['tanggal']);

        print json_encode($time);
    }
}
