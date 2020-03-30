<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Layanan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('LaundryLayananModel','laundry_layanan');
        $this->load->model('UserModel', 'user');
    }

    public function index()
    {
        $data['profile']    = $this->user->fetch_laundry($this->user_id);
        $data['layanan'] = $this->laundry_layanan->find_by()->result();
        $this->render_admin('admin/layanan/index',$data);
    }

    public function create()
    {
        $data = array(
            'laundry_id' => $this->laundry,
            'name'       => htmlspecialchars($this->input->post('name')),
            'price'      => htmlspecialchars($this->input->post('price')),
            'created_at' => date('Y-m-d H:i:s')
        );

        $result = $this->laundry_layanan->insert($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Layanan Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Layanan Gagal Disimpan');
        }

        redirect('Admin/Layanan');
    }

    public function edit($id)
    {
        $data = array(
            'name'      => htmlspecialchars($this->input->post('name')),
            'price'     => htmlspecialchars($this->input->post('price')),
            'updated_at'=> date('Y-m-d H:i:s')
        );

        $result = $this->laundry_layanan->update($id, $data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Layanan Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Layanan Gagal Diubah');
        }

        redirect('Admin/Layanan');

    }

    public function delete($id)
    {
        $data = array(
            'is_delete' => 1
        );

        $result = $this->laundry_layanan->update($id, $data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Layanan Berhasil Dihapus');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Layanan Gagal Dihapus');
        }

        redirect('Admin/Layanan');
    }
}
?>