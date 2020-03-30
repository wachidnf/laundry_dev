<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Testimoni extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('TestimoniModel','testimoni');
        $this->load->model('CustomerModel','customer');
        $this->load->model('UserModel', 'user');
    }

    public function index()
    {
        $data['profile']    = $this->user->fetch_laundry($this->user_id);
        $data['customer'] = $this->customer->find_by()->result();
        $data['testimoni'] = $this->testimoni->find_by()->result();
        $this->render_admin('admin/testimoni/index',$data);
    }

    public function create()
    {
        $data = array(
            'customer_id'   => htmlspecialchars($this->input->post('customer_id')),
            'laundry_id'    => $this->laundry,
            'message'       => htmlspecialchars($this->input->post('message')),
            'created_at'    => date('Y-m-d H:i:s')
        );
        
        $result = $this->testimoni->insert($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Testimoni Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Testimoni Gagal Disimpan');
        }

        redirect('Admin/Testimoni');
    }

    public function edit($id)
    {
        $data = array(
            'customer_id'   => htmlspecialchars($this->input->post('customer_id')),
            'message'       => htmlspecialchars($this->input->post('message')),
            'updated_at'    => date('Y-m-d H:i:s')
        );

        $result = $this->testimoni->update($id, $data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Testimoni Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Testimoni Gagal Diubah');
        }

        redirect('Admin/Testimoni');
    }

    public function delete($id)
    {
        $data = array(
            'is_delete' => 1
        );

        $result = $this->testimoni->update($id,$data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Testimoni Berhasil Dihapus');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Testimoni Gagal Dihapus');
        }

        redirect('Admin/Testimoni');
    }
}
?>