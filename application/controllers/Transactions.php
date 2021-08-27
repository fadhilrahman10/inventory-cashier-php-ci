<?php

class Transactions extends CI_Controller
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
            $data['active'] = 'tra';
        }

        $data['addon_style'] = ['https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css', 'https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css'];

        $data['prev_script'] = ['https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js', 'https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js'];

        $data['addon_script_local'] = ['assets/script/datatable.js', 'assets/script/sweetAlert.js'];

        $data['penjualan'] = $this->crud->lap_penjualan('', false, 10);
        $data['pembelian'] = $this->crud->lap_pembelian('', false, 10);

        $this->form_validation->set_rules('bulan', 'Month', 'required');

        if ($this->form_validation->run() == false) {
            $data['data'] = $this->crud->lap_pembelian();
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('transactions/index.php', $data);
            $this->load->view('templates/footer.php', $data);
        }

    }

    public function detail($id)
    {
        # code...
        $data['active'] = 'pem';
        $data['sub_active'] = '';

        $data['addon_script_local'] = ['assets/script/printContent.js'];
        $data['data'] = $this->crud->lap_penjualan(['no_pembelian' => $id], true);

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('transactions/detail.php', $data);
        $this->load->view('templates/footer.php', $data);

    }

}
