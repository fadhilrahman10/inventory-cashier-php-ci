<?php

class Account extends CI_Controller
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
            $data['sub_active'] = 'lap_bar';
            $data['sort'] = true;
        } else {
            $data['add'] = true;
            $data['sub_active'] = '';
            $data['active'] = 'acc';
        }

        $user = $this->session->userdata('user');
        $data['user'] = $this->crud->show_row('admin', ['id_admin' => $user['id_admin']]);

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pw', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['barang'] = $this->crud->show('barang');
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('account/index.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $username = $this->input->post('username');
            $pw = $this->input->post('pw');
            $id_admin = $this->input->post('id_admin');
            $cek = $this->db->get_where('admin', ['username' => $username])->num_rows();

            $val = [
                'username' => $username,
                'password' => $pw,
            ];

            if ($cek == 1) {
                $this->session->set_flashdata('success', 'Data Berhasil di ubah');
                $this->crud->update('admin', $val, ['id_admin' => $id_admin]);
                redirect('account');
            } else {
                $this->session->set_flashdata('success', 'Data gagal di ubah');
                redirect('account');
            }
        }

    }
}
