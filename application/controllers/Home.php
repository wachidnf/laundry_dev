<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel','user');
        $this->load->model('TestimoniModel','testimoni');
    }

    public function index()
    {
        $data['testimoni'] = $this->testimoni->find()->result();
        $this->render_home('home/index',$data);
    }

    public function LoginRegister()
    {
        $this->render_login('home/loginregister');
    }

    public function login()
    {
        $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES); 
        $password = htmlspecialchars(md5($this->input->post('password',true)), ENT_QUOTES); 
        $user = $this->user->get($username);
        $roles = $this->user->fetch_roles($user->id);
        $laundry = $this->user->fetch_laundry($user->id);

        if(empty($user)){ 
            $this->session->set_flashdata('message', 'Username tidak ditemukan / nonaktif'); 
            redirect('Home/LoginRegister');
        }else{
            if ($password == $user->password) {
            $session = array(
                'user_id'         => $user->id,
                'authenticated'   => true, 
                'username'        => $user->username, 
                'laundry_name'    => $laundry->name,
                'laundry_address' => $laundry->address,
                'laundry_id'      => $laundry->id,
                'roles' 	      => array_column($roles, 'kode'),
                'roles_name'      => array_column($roles, 'nama'),
                'logo'            => $laundry->logo
            );
            $this->session->set_userdata($session);
            redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', 'Password salah');
                redirect('Home/LoginRegister');
            }
        }
    }

    public function register()
    {
        $data = array(
            'username'  => htmlspecialchars($this->input->post('usernameRegis')),
            'password'  => htmlspecialchars(md5($this->input->post('passwordRegis'))),
            'email'     => htmlspecialchars($this->input->post('emailRegis'))
        );

        $this->user->insert($data);
        $this->session->set_flashdata('message_register', 'Silahkan Login dengan memasukkan username dan password');
        redirect('Home/LoginRegister');
    }

    public function logout()
    {
        $this->session->sess_destroy(); // Hapus semua session
        redirect('Home'); // Redirect ke halaman login
    }
}
?>