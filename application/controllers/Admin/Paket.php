<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Paket extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('LaundryPaketModel','laundry_paket');
        $this->load->model('UserModel', 'user');
    }

    public function index()
    {
        $data['profile']    = $this->user->fetch_laundry($this->user_id);
        $data['paket'] = $this->laundry_paket->find_by()->result();
        $this->render_admin('admin/paket/index',$data);
    }

    public function create()
    {
        $data = array(
            'laundry_id'=> $this->laundry,
            'name'      => htmlspecialchars($this->input->post('name')),
            'price'     => htmlspecialchars($this->input->post('price')),
            'is_member' => htmlspecialchars($this->input->post('is_member')),
            'created_at'=> date('Y-m-d H:i:s')
        );

        $result = $this->laundry_paket->insert($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Paket Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Paket Gagal Disimpan');
        }

        redirect('Admin/Paket');
    }

    public function edit($id)
    {
        $data = array(
            'name'      => htmlspecialchars($this->input->post('name')),
            'price'     => htmlspecialchars($this->input->post('price')),
            'updated_at'=> date('Y-m-d H:i:s')
        );

        $result = $this->laundry_paket->update($id,$data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Paket Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Paket Gagal Diubah');
        }

        redirect('Admin/Paket');
    }

    public function filter()
    {
        
    }

    public function delete($id)
    {
        $data = array(
            'is_delete' => 1
        );

        $result = $this->laundry_paket->update($id,$data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Paket Berhasil Dihapus');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Paket Gagal Dihapus');
        }

        redirect('Admin/Paket');
    }
}
?>