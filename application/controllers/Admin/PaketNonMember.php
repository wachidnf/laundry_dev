<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class PaketNonMember extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('LaundryPaketModel', 'laundry_paket');
        $this->load->model('UserModel', 'user');
    }

    public function index()
    {
        $data['profile']    = $this->user->fetch_laundry($this->user_id);
        $data['paket'] = $this->laundry_paket->find_by_non_member()->result();
        $this->render_admin('admin/paket_non_member/index',$data);
    }

    public function create()
    {
        $data = array(
            'laundry_id'=> $this->laundry,
            'name'      => htmlspecialchars($this->input->post('name')),
            'price'     => htmlspecialchars($this->input->post('price'))
        );

        $result = $this->laundry_paket->insert_non_member($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Paket Non Member Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Paket Non Member Gagal Disimpan');
        }

        redirect('Admin/PaketNonMember');
    }

    public function edit($id)
    {
        $data = array(
            'name'      => htmlspecialchars($this->input->post('name')),
            'price'     => htmlspecialchars($this->input->post('price'))
        );

        $result = $this->laundry_paket->update_non_member($id, $data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Paket Non Member Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Paket Non Member Gagal Disimpan');
        }

        redirect('Admin/PaketNonMember');
    }
}
?>