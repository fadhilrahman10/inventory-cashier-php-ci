<?php

class Pembelian extends CI_Controller
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
            $data['sub_active'] = 'lap_pem';
            $data['sort'] = true;
        } else {
            $data['add'] = true;
            $data['sub_active'] = '';
            $data['active'] = 'pem';
        }

        $data['addon_style'] = ['https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css', 'https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css'];

        $data['prev_script'] = ['https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js', 'https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js','https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js'];

        $data['addon_script_local'] = ['assets/script/sweetAlert.js', 'assets/script/printContent.js'];

        $this->form_validation->set_rules('bulan', 'Month', 'required');

        if ($this->form_validation->run() == false) {
			$data['data'] = $this->crud->lap_pembelian();
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('pembelian/index.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
			$month = explode('-', $this->input->post('bulan'));
			
			$data['bulan'] = $this->input->post('bulan');
            $data['data'] = $this->crud->lap_pembelian(['MONTH(tanggal)' => $month[1]]);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('pembelian/index.php', $data);
            $this->load->view('templates/footer.php', $data);

        }

    }

    public function add()
    {
        # code...
        $data['active'] = 'pem';
        $data['sub_active'] = '';

        $admin = $this->session->userdata('user');
        $data['kode'] = $this->crud->kode('no_pembelian', 'pembelian', 'PB-');
        $data['prev_script'] = ['https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js'];
        $data['addon_style'] = ['https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css'];

        $data['barang'] = $this->crud->show('barang');
        $data['supplier'] = $this->crud->show('supplier');

        $this->form_validation->set_rules('no_pembelian', 'No Pembelian', 'required|is_unique[pembelian.no_pembelian]');
        // $this->form_validation->set_rules('id_barang', 'Barang', 'required');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'is_unique[barang.nama_barang]');
        $this->form_validation->set_rules('unit', 'Unit', 'alpha');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'numeric');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('pembelian/create.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {

            $cek = $this->input->post('is_new_product');
            $id_barang = $this->input->post('id_barang');

            if ($cek === 'true') {
                $val = [
                    'id_barang' => $this->crud->kode('id_barang', 'barang', 'BR'),
                    'nama_barang' => $this->input->post('nama_barang'),
                    'jumlah' => $this->input->post('jumlah'),
                    'unit' => $this->input->post('unit'),
                    'harga_beli' => $this->input->post('harga_beli'),
                    'harga_jual' => $this->input->post('harga_jual'),
                    'tgl_input' => date('Y-m-d'),
                ];
                $this->crud->add('barang', $val);
                $count = $this->crud->show('barang');
                $id_barang = $count[count($count) - 1]['id_barang'];
            }

            $val = [
                'no_pembelian' => $this->input->post('no_pembelian'),
                'id_barang' => $id_barang,
                'id_supplier' => $this->input->post('id_supplier'),
                'jumlah' => $this->input->post('jumlah'),
                'total' => $this->input->post('jumlah'),
                'tanggal' => date('Y-m-d H:i:s'),
                'id_admin' => $admin['id_admin'],
            ];

            $this->crud->add('pembelian', $val);
            if ($cek === 'false') {
                $this->crud->update('barang', null, ['id_barang' => $this->input->post('id_barang')], 'jumlah', 'jumlah+' . $this->input->post('jumlah'));
            }
            $this->session->set_flashdata('success', 'Data Success');
            redirect('barang');
        }

    }
    public function detail($id)
    {
        # code...
        $data['active'] = 'pem';
        $data['sub_active'] = '';

        $data['addon_script_local'] = ['assets/script/printContent.js'];
        $data['data'] = $this->crud->lap_pembelian(['no_pembelian' => $id], true);

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('pembelian/detail.php', $data);
        $this->load->view('templates/footer.php', $data);

    }

	public function get_harga()
	{
		# code...
		$id = $this->input->post('id_barang');
		$data = $this->crud->show_field('barang', 'harga_beli', ['id_barang' => $id]);
		print json_encode($data['harga_beli']);
	}

}
