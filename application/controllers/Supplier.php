<?php

class Supplier extends CI_Controller
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
            $data['sub_active'] = 'lap_sup';
            $data['sort'] = true;
        } else {
            $data['add'] = true;
            $data['sub_active'] = '';
            $data['active'] = 'sup';
        }

        $data['addon_style'] = ['https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css', 'https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', 'https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css'];

        $data['prev_script'] = ['https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js', 'https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js', 'https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js', 'https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js'];

        $data['addon_script_local'] = ['assets/script/datatable.js', 'assets/script/sweetAlert.js'];

        $data['data'] = $this->crud->show('supplier');
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('supplier/index.php', $data);
        $this->load->view('templates/footer.php', $data);
    }

    public function add()
    {
        # code...
        $data['active'] = 'sup';
        $data['sub_active'] = '';

        $data['kode'] = $this->crud->kode('id_supplier', 'supplier', 'SP-');

        $this->form_validation->set_rules('id_supplier', 'ID supplier', 'required|is_unique[supplier.id_supplier]');
        $this->form_validation->set_rules('nama', 'Nama Supplier', 'required|is_unique[supplier.nama]');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric|max_length[14]|min_length[10]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('supplier/create.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $val = [
                'id_supplier' => $this->input->post('id_supplier'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->crud->add('supplier', $val);
            $this->session->set_flashdata('success', 'Data Success');
            redirect('supplier');
        }

    }
    public function update($id)
    {
        # code...
        $data['active'] = 'sup';
        $data['sub_active'] = '';

        $data['data'] = $this->crud->show_row('supplier', ['id_supplier' => $id]);

        $this->form_validation->set_rules('id_supplier', 'ID supplier', 'required');
        $this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('supplier/edit.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $id_supplier = $this->input->post('id_supplier');
            $val = [
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->crud->update('supplier', $val, ['id_supplier' => $id_supplier]);
            $this->session->set_flashdata('success', 'Data Updated');
            redirect('supplier');
        }

    }

    public function hapus($id)
    {
        # code...
        $del = $this->crud->del('supplier', ['id_supplier' => $id]);
        if ($del) {
            $this->session->set_flashdata('success', 'Data Was Deleted');
            redirect('supplier');
        } else {
            $this->session->set_flashdata('success', "Data Can't Delete");
            redirect('supplier');
        }
    }
}
