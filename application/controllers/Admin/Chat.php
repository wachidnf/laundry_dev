<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Chat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('ChatModel', 'chat');
        $this->load->model('UserModel', 'user');
    }

    public function index()
    {
        $data['chat'] = $this->chat->find_by()->result();
        $data['open'] = 'hidden';
        $this->render_admin('admin/chat/index', $data);
    }

    public function detail($id)
    {
        $criteria['id_customer'] = $id;
        $data['chat'] = $this->chat->find_by()->result();
        $data['customer'] = $this->chat->find($criteria)->row()->customer_pengirim;
        $data['customer_id'] = $this->chat->find($criteria)->row()->customer_id;
        $data['detail_chat'] = $this->chat->find($criteria)->result();
        if($id != null){
            $data['open']   = '';
        }else{
            $data['open']   = 'hidden';
        }
        $this->render_admin('admin/chat/index', $data);
    }

    public function send($customer_id)
    {
        $data = array(
            'pesan'     => $this->input->post('pesan'),
            'pengirim'  => $this->user_id,
            'penerima'  => $customer_id
        );
        $this->chat->insert($data);
        redirect('Admin/Chat/detail/'.$customer_id);
    }
}
?>