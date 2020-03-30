<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    protected function authenticated(){ // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
        // Pertama kita cek dulu apakah controller saat ini yang sedang diakses user adalah controller Auth apa bukan
        // Karena fungsi cek login hanya kita berlakukan untuk controller selain controller Auth
        if ($this->uri->segment(1) != 'Home' && $this->uri->segment(1) != '') {
            // Cek apakah terdapat session dengan nama authenticated
            if (! $this->session->userdata('authenticated')) { // Jika tidak ada / artinya belum login
                redirect('Home/LoginRegister');
            } // Redirect ke halaman login
        }
    }

    protected function check_admin()
    {
        if (!$this->has_role('ROLE_ADMIN')) {
            show_404();
        }
    }

    protected function check_superadmin()
    {
        if (!$this->has_role('ROLE_SUPERADMIN')) {
            show_404();
        }
    }

    protected function has_role($kode)
    {
        $roles = $this->session->userdata('roles');

        return in_array($kode, $roles);
    }

    protected function render_home($content, $data = NULL)
    {
        $data['content']    = $this->load->view($content, $data, TRUE);
        $this->load->view('home/index', $data);
    }

    protected function render_login($content, $data = NULL)
    {
        $data['content']    = $this->load->view($content, $data, TRUE);
        $this->load->view('home/loginregister', $data);
    }

    protected function render_admin($content, $data = NULL)
    {
        $data['akun']       = $this->session->userdata('laundry_name');
        $data['address']    = $this->session->userdata('laundry_address');
        $data['logo']       = get_logo($this->session->userdata('logo'));
        $data['head']       = $this->load->view('admin/section/head', $data, TRUE);
        $data['header']     = $this->load->view('admin/section/header', $data, TRUE);
        $data['menu']       = $data['menu'] ?? $this->uri->segment(2) ?? 'Dashboard';
        $data['sidebar']    = $this->load->view('admin/section/sidebar',$data, TRUE);
        $data['content']    = $this->load->view($content, $data, TRUE);
        $data['script']     = $this->load->view('admin/section/script', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    protected function render_superadmin($content, $data = NULL)
    {
        $data['akun']       = $this->session->userdata('username');
        $data['logo']       = get_logo($this->session->userdata('logo'));
        $data['head']       = $this->load->view('superadmin/section/head', $data, TRUE);
        $data['header']     = $this->load->view('superadmin/section/header', $data, TRUE);
        $data['menu']       = $data['menu'] ?? $this->uri->segment(2) ?? 'Dashboard';
        $data['sidebar']    = $this->load->view('superadmin/section/sidebar',$data, TRUE);
        $data['content']    = $this->load->view($content, $data, TRUE);
        $data['script']     = $this->load->view('superadmin/section/script', $data, TRUE);
        $this->load->view('superadmin/layout', $data);
    }
}
?>