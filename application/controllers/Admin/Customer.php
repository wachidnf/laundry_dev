<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->load->model('CustomerModel', 'customer');
        $this->load->model('UserModel', 'user');
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
    }

    public function index()
    {
        $data['profile'] = $this->user->fetch_laundry($this->user_id);
        // print_r($data['profile']);die;
        $data['customer'] = $this->customer->find_by()->result();
        $this->render_admin('admin/customer/index',$data);
    }

    public function create()
    {
        $data = array(
            'laundry_id'=> $this->laundry,
            'name'      => htmlspecialchars($this->input->post('name')),
            'phone'     => htmlspecialchars($this->input->post('phone')),
            'address'   => htmlspecialchars($this->input->post('address')),
            'gender'    => htmlspecialchars($this->input->post('gender')),
            'is_member' => htmlspecialchars($this->input->post('is_member')),
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => md5($this->input->post('password')),
            'email'     => htmlspecialchars($this->input->post('email'))
        );

        $result = $this->customer->insert($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Customer Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Customer Gagal Disimpan');
        }

        redirect('Admin/Customer');
    }

    public function edit($id)
    {
        $data = array(
            'name'      => htmlspecialchars($this->input->post('name')),
            'phone'     => htmlspecialchars($this->input->post('phone')),
            'address'   => htmlspecialchars($this->input->post('address')),
            'gender'    => htmlspecialchars($this->input->post('gender')),
            'is_member' => htmlspecialchars($this->input->post('is_member')),
            'updated_at'=> date('Y-m-d H:i:s')
        );

        $result = $this->customer->update($id,$data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Customer Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Customer Gagal Diubah');
        }

        redirect('Admin/Customer');
    }

    public function delete($id)
    {
        $data = array(
            'is_delete' => 1
        );

        $result = $this->customer->update($id,$data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Customer Berhasil Dihapus');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Customer Gagal Dihapus');
        }

        redirect('Admin/Customer');
    }
}
?>