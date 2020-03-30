<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Pemesanan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('PemesananModel','pemesanan');
        $this->load->model('UserModel','user');
        $this->load->model('CustomerModel', 'customer');
        $this->load->model('LaundryPaketModel', 'laundry_paket');
        $this->load->model('LaundryLayananModel', 'laundry_layanan');
    }

    public function index()
    {
        $data['customer']   = $this->customer->find_by()->result();
        $data['profile']    = $this->user->fetch_laundry($this->user_id);
        $data['pemesanan'] = $this->pemesanan->find_by()->result();
        $this->render_admin('admin/pemesanan/index', $data);
    }

    public function form_create()
    {
        $data['customer']   = $this->customer->find_by()->result();
        $data['pemesanan']  = $this->pemesanan->find_by()->result();
        $data['layanan']    = $this->laundry_layanan->find_by()->result();
        $this->render_admin('admin/pemesanan/add', $data);
    }

    public function get_paket()
    {
        $where = $this->input->post('customer_id');
        $cek_member = $this->customer->find($where)->row()->is_member;
        if($cek_member == 0){
            $dataPaket = $this->laundry_paket->find_by_non_member()->result();
            $ket = 'Non Member';
        }else{
            $dataPaket = $this->laundry_paket->find_by_member()->result();
            $ket = 'Member';
        }
        $html = "<option value='' selected disabled>-- Pilih --</option>";
        foreach($dataPaket as $p){
            $html .= "<option value='".$p->id."'>".$p->name.' - '.$ket."</option>";
        }
        $callback = array('data_paket'=>$html, 'ket'=>$ket);
        echo json_encode($callback);
    }

    public function get_kuota()
    {
        $criteria['id'] = $this->input->post('paket_id');
        $dataPaket = $this->laundry_paket->find_by_member($criteria)->result();
        $html = "<input type='number'></input>";
        foreach($dataPaket as $p){
            $html .= "<option value='".$p->kuota."'>".$p->kuota.' Kg'."</option>";
        }
        $callback = array('data_kuota'=>$html);
        echo json_encode($callback);
    }

    public function get_harga_laundry()
    {
        $customer_id = $this->input->post('customer_id');
        $cek_member = $this->customer->find($customer_id)->row()->is_member;
        $criteria['id'] = $this->input->post('paket_id');
        if($cek_member == 0){
            $dataPaket = $this->laundry_paket->find_by_non_member($criteria)->result();
        }else{
            $dataPaket = $this->laundry_paket->find_by_member($criteria)->result();
        }
        $html = "<input type='number'></input>";
        foreach($dataPaket as $p){
            $html .= "<option value='".$p->price."'>".$p->price."</option>";
        }
        $callback = array('data_harga'=>$html);
        echo json_encode($callback);
    }

    public function get_harga_layanan()
    {
        $layanan_id = $this->input->post('layanan_id');
        $dataLayanan = $this->laundry_layanan->find($layanan_id)->result();
        $html = "<input type='number'></input>";
        foreach($dataLayanan as $p){
            $html .= "<option value='".$p->price."'>".$p->price."</option>";
        }
        $callback = array('data_layanan'=>$html);
        echo json_encode($callback);
    }
    public function create()
    {
        $generate = date('Ymd').$this->input->post('tanggal_selesai').$this->input->post('customer_id');
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$generate), array())->draw();
        $image_name     = date('Y-m-d').$this->input->post('customer_id').'.jpg';
        $image_dir      = './assets/barcode/'; // penyimpanan file barcode
        imagejpeg($image_resource, $image_dir.$image_name);

        $data = array(
            'laundry_id'        => $this->laundry,
            'customer_id'       => $this->input->post('customer_id'),
            'paket_id'          => $this->input->post('paket_id'),
            'layanan_id'        => $this->input->post('layanan_id'),
            'tanggal_masuk'     => date('Y-m-d'),
            'tanggal_selesai'   => $this->input->post('tanggal_selesai'),
            'berat'             => $this->input->post('berat'),
            'jml_bayar'         => $this->input->post('jml_bayar'),
            'kuota'             => $this->input->post('kuota'),
            'is_bayar'          => $this->input->post('is_bayar'),
            'bar_code'          => $image_name
        );

        $result = $this->pemesanan->insert($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Pemesanan Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Pemesanan Gagal Disimpan');
        }

        redirect('Admin/Pemesanan');
    }

    public function edit($id)
    {
        $data['is_bayar']  = $this->input->post('is_bayar');
        $result = $this->pemesanan->update($id,$data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Pemesanan Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Pemesanan Gagal Diubah');
        }

        redirect('Admin/Pemesanan');
    }
}
?>