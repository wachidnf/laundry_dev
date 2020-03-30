<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->load->model('CustomerModel', 'customer');
        $this->load->model('UserModel', 'user');
        $this->laundry = $this->session->userdata('laundry_id');
    }

    public function index()
    {
        $this->render_admin('admin/laporan/index');
    }
}
?>