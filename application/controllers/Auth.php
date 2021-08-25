<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Crud_model', 'crud');
        $this->load->library('form_validation');		
    }

    public function index()
    {
        # code...
        $data['ss'] = '';
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

		$user = $this->session->userdata('user');
		if($user != null){
			if($user['status'] == 'admin'){
				redirect('dashboard');
			} else {
				redirect('cashier');
			}
		}

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('auth/login.php', $data);
            $this->load->view('templates/footer.php', $data);
        } else {
            $user = $this->db->get_where('admin', ['username' => $this->input->post('username'), 'password' => $this->input->post('pass')])->num_rows();

            if ($user == 1) {
                $data_user = $this->crud->show_row('admin', ['username' => $this->input->post('username')]);
                $this->session->set_userdata('user', $data_user);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('login', 'Username / Password Salah');
                redirect('auth');
            }
        }
    }

    public function register()
    {
        # code...
        $data['aa'] = '';

		$user = $this->session->userdata('user');
		if($user != null){
			if($user['status'] == 'admin'){
				redirect('dashboard');
			} else {
				redirect('cashier');
			}
		}

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('auth/register.php', $data);
            $this->load->view('templates/auth/footer.php', $data);
        } else {
            $val = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('pass'),
                'status' => 'kasir',
            ];
            $cek = $this->db->get_where('admin', ['username' => $this->input->post('username')])->num_rows();
            if ($cek > 0) {
                $this->session->set_flashdata('gagal', 'Username sudah ada!');
                redirect('auth/register');
            } else {
                $this->session->set_flashdata('success', 'Sign-up success, Please Login!');
                $this->crud->add('admin', $val);
                redirect('auth');
            }
        }

    }

    public function logout()
    {
        # code...
        session_destroy();
        redirect('auth');
    }
}
