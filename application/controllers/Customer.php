<?php

class Customer extends CI_Controller
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
            $data['sub_active'] = 'lap_cus';
            $data['sort'] = true;
        } else {
            $data['add'] = true;
            $data['sub_active'] = '';
            $data['active'] = 'cus';
        }

        $data['addon_style'] = ['https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css', 'https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css'];

        $data['prev_script'] = ['https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js', 'https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js'];

        $data['addon_script_local'] = ['assets/script/datatable.js', 'assets/script/sweetAlert.js', 'assets/script/printContent.js'];

        $data['data'] = $this->crud->show('customer');
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('customer/index.php', $data);
        $this->load->view('templates/footer.php', $data);

    }

    public function add()
    {
        # code...
        $data['active'] = 'bar';
        $data['sub_active'] = '';

        $data['kode'] = $this->crud->kode('id_customer', 'customer', 'CS-');

        $this->form_validation->set_rules('id_customer', 'ID Customer', 'required|is_unique[customer.id_customer]');
        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required|is_unique[customer.nama_customer]');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric|max_length[14]|min_length[10]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('customer/create.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $val = [
                'id_customer' => $this->input->post('id_customer'),
                'nama_customer' => $this->input->post('nama_customer'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->crud->add('customer', $val);
            $this->session->set_flashdata('success', 'Data Success');
            redirect('customer');
        }

    }
    public function update($id)
    {
        # code...
        $data['active'] = 'cus';
        $data['sub_active'] = '';

        $data['data'] = $this->crud->show_row('customer', ['id_customer' => $id]);

        $this->form_validation->set_rules('id_customer', 'ID customer', 'required');
        $this->form_validation->set_rules('nama_customer', 'Nama customer', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('customer/edit.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $id_customer = $this->input->post('id_customer');
            $val = [
                'nama_customer' => $this->input->post('nama_customer'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->crud->update('customer', $val, ['id_customer' => $id_customer]);
            $this->session->set_flashdata('success', 'Data Updated');
            redirect('customer');
        }

    }

    public function hapus($id)
    {
        # code...
        $del = $this->crud->del('customer', ['id_customer' => $id]);
        if ($del) {
            $this->session->set_flashdata('success', 'Data Was Deleted');
            redirect('customer');
        } else {
            $this->session->set_flashdata('success', "Data Can't Delete");
            redirect('customer');
        }
    }
}
