<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Dashboard extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->load->model('CustomerModel','customer');
        $this->load->model('TestimoniModel', 'testimoni');
        $this->load->model('PemesananModel','pemesanan');
    }

    public function index()
    {
        if ($this->has_role('ROLE_ADMIN')) {
            /**
            * Ini untuk direct ke layout Admin
            */

            $this->dashboard_admin();
        }elseif($this->has_role('ROLE_SUPERADMIN')){
            $this->dashboard_superadmin();
        }elseif($this->has_role('ROLE_CUSTOMER')){
            $this->session->sess_destroy();
            redirect('Home');
        } 
    }

    public function dashboard_admin()
    {
        $data['total_customer'] = $this->customer->count_total();
        $data['total_testimoni'] = $this->testimoni->count_total();
        $data['total_pesanan']  = $this->pemesanan->count_total();
        $data['pemesanan']  = $this->pemesanan->find_by()->result();
        $this->render_admin('admin/dashboard',$data);
    }

    public function dashboard_superadmin()
    {
        $this->render_superadmin('superadmin/dashboard');
    }
}
?>