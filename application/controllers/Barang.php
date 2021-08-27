<?php

class Barang extends CI_Controller
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
            $data['sub_active'] = 'lap_bar';
            $data['sort'] = true;
        } else {
            $data['add'] = true;
            $data['sub_active'] = '';
            $data['active'] = 'bar';
        }

        $data['addon_style'] = ['https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css', 'https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css'];

        $data['prev_script'] = ['https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js', 'https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js',];

        $data['addon_script_local'] = ['assets/script/datatable.js', 'assets/script/sweetAlert.js', 'assets/script/printContent.js'];

        $this->form_validation->set_rules('bulan', 'Month', 'required');

        if ($this->form_validation->run() == false) {
            $data['barang'] = $this->crud->show('barang');
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('barang/index.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $month = explode('-', $this->input->post('bulan'));
            $data['barang'] = $this->crud->show('barang', ['MONTH(tgl_input)' => $month[1]]);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('barang/index.php', $data);
            $this->load->view('templates/footer.php', $data);

        }

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
}
