<?php

class Cashier extends CI_Controller
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

    }

    public function index($lap = '')
    {
        # code...
        if ($lap == 'active') {
            $data['active'] = 'lap';
            $data['sub_active'] = '';
            $data['sort'] = true;
        } else {
            $data['add'] = true;
            $data['sub_active'] = '';
            $data['active'] = 'cash';
        }

        $data['barang'] = $this->crud->show('barang', ['jumlah!=' => 0]);
        $data['customer'] = $this->crud->show('customer');

        $data['addon_style'] = ['https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css'];
        $this->form_validation->set_rules('bulan', 'Month', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('cashier/index.php', $data);
            $this->load->view('templates/cashier/footer.php', $data);
        } else {

        }

    }

    public function add()
    {
        # code...
        $user = $this->session->userdata('user');
        $no_penjualan = $this->crud->kode('no_penjualan', 'penjualan', 'TR');
        $id_barang = $this->input->post('id_barang');
        $id_customer = $this->input->post('id_customer');
        $val = [
            'no_penjualan' => $no_penjualan,
            'id_barang' => $id_barang,
            'id_customer' => $id_customer,
            'jumlah' => 1,
            'tanggal' => date('Y-m-d H:i:s'),
            'status' => 'belum',
            'id_admin' => $user['id_admin'],
        ];
        $this->crud->add('penjualan', $val);
        print json_encode($val);
    }

    public function get_data()
    {
        # code...
        $data = $this->crud->lap_penjualan(['status' => 'belum']);
        print json_encode($data);
    }

    public function plus()
    {
        # code...
        $no_penjualan = $this->input->post('no_penjualan');
        $this->crud->update('penjualan', '', ['no_penjualan' => $no_penjualan], 'jumlah', 'jumlah+1');
        print json_encode('oke');
    }

    public function minus()
    {
        # code...
        $no_penjualan = $this->input->post('no_penjualan');
        $cek = $this->crud->show_row('penjualan', ['no_penjualan' => $no_penjualan]);
        if ($cek['jumlah'] > 1) {
            $this->crud->update('penjualan', '', ['no_penjualan' => $no_penjualan], 'jumlah', 'jumlah-1');
        }
        print json_encode('oke');
    }

    public function hapus()
    {
        # code...
        $no_penjualan = $this->input->post('no_penjualan');
        $this->crud->del('penjualan', ['no_penjualan' => $no_penjualan]);
        print json_encode('oke');
    }

    public function pay()
    {
        # code...
        $barang = $this->crud->lap_penjualan(['status' => 'belum']);
        foreach ($barang as $dt) {
            $this->crud->update('barang', '', ['id_barang' => $dt['id_barang']], 'jumlah', 'jumlah-' . $dt['jumlah']);
            $total = $dt['jumlah'] * $dt['harga_jual'];
            $this->crud->update('penjualan', ['total' => $total], ['no_penjualan' => $dt['no_penjualan']]);
        }
        $this->crud->update('penjualan', ['status' => 'sudah'], ['status' => 'belum']);
        print json_encode('oke');
    }

    public function laporan()
    {
        # code...
        $data['active'] = 'lap';
        $data['sub_active'] = 'lap_pen';
        $data['sort'] = true;

        $data['addon_style'] = ['https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css', 'https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css'];

        $data['prev_script'] = ['https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js', 'https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js','https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js'];

        $data['addon_script_local'] = ['assets/script/datatable.js', 'assets/script/sweetAlert.js', 'assets/script/printContent.js'];

        $this->form_validation->set_rules('bulan', 'Month', 'required');

        if ($this->form_validation->run() == false) {
            $data['data'] = $this->crud->lap_penjualan(['status' => 'sudah']);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('cashier/laporan.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $month = explode('-', $this->input->post('bulan'));

            $data['data'] = $this->crud->lap_penjualan(['MONTH(tanggal)' => $month[1], 'status' => 'sudah']);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('cashier/laporan.php', $data);
            $this->load->view('templates/footer.php', $data);

        }

    }

    public function detail($id)
    {
        # code...
        $data['active'] = 'lap';
        $data['sub_active'] = 'lap_pen';

        $data['addon_script_local'] = ['assets/script/printContent.js'];
        $data['data'] = $this->crud->lap_penjualan(['no_penjualan' => $id], true);

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('cashier/detail.php', $data);
        $this->load->view('templates/footer.php', $data);

    }

}
