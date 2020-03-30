<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class PaketMember extends MY_Controller
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
        $data['paket'] = $this->laundry_paket->find_by_member()->result();
        $this->render_admin('admin/paket_member/index',$data);
    }

    public function create()
    {
        $data = array(
            'laundry_id'=> $this->laundry,
            'name'      => htmlspecialchars($this->input->post('name')),
            'kuota'     => htmlspecialchars($this->input->post('kuota')),
            'price'     => htmlspecialchars($this->input->post('price'))
        );

        $result = $this->laundry_paket->insert_member($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Paket Member Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Paket Member Gagal Disimpan');
        }

        redirect('Admin/PaketMember');
    }

    public function edit($id)
    {
        $data = array(
            'name'      => htmlspecialchars($this->input->post('name')),
            'kuota'     => htmlspecialchars($this->input->post('kuota')),
            'price'     => htmlspecialchars($this->input->post('price'))
        );

        $result = $this->laundry_paket->update_member($id, $data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Paket Member Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Paket Member Gagal Diubah');
        }

        redirect('Admin/PaketMember');
    }
}
?>