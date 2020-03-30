<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pemesanan extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_put']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->database();
    }

    public function index_get() 
    {
        $id_pemesanan = $this->get('id');
        if ($id_pemesanan == '') {
            $this->db->select('p.*, l.id as laundry_id, c.id as customer_id, c.is_member, lp.id as paket_id, ll.id as layanan_id, c.name as customer_name, lp.name as paket_name, ll.name as layanan_name, lpm.kuota, lpm.price as harga_member, lpn.price as harga_non_member');
            $this->db->from('pemesanan p');
            $this->db->join('laundry l','l.id = p.laundry_id','left');
            $this->db->join('customer c','c.id = p.customer_id','left');
            $this->db->join('laundry_paket lp','lp.id = p.paket_id','left');
            $this->db->join('laundry_layanan ll','ll.id = p.layanan_id','left');
            $this->db->join('laundry_paket_member lpm', 'lpm.laundry_paket_id = lp.id', 'left');
            $this->db->join('laundry_paket_non_member lpn', 'lpn.laundry_paket_id = lp.id', 'left');
            $pemesanan = $this->db->get()->result();
        } else {
            $this->db->where('id', $id_pemesanan);
            $pemesanan = $this->db->get('pemesanan')->result();
        }

        if($pemesanan){
            $this->response([
                'status'    => TRUE,
                'data'      => $pemesanan
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response(array('status' => 'FALSE', REST_Controller::HTTP_NOT_FOUND));
        }
    }

    public function index_post()
    {
        $data1 = array(
            'laundry_id'        => $this->post('laundry_id'),
            'customer_id'       => $this->post('customer_id'),
            'paket_id'          => $this->post('paket_id'),
            'layanan_id'        => $this->post('layanan_id'),
            'tanggal_masuk'     => $this->post('tanggal_masuk'),
            'tanggal_selesai'   => $this->post('tanggal_selesai'),
            'berat'             => $this->post('berat'),
            'jml_bayar'         => $this->post('jml_bayar'),
            'is_bayar'          => $this->post('is_bayar')
        );
        if(!empty($this->post('kuota'))){
            $this->db->insert('pemesanan', $data1);

            $data2 = array(
                'customer_id'       => $this->post('customer_id'),
                'paket_id'          => $this->post('paket_id'),
                'kuota'             => $this->post('kuota')
            );
            $insert = $this->db->insert('customer_kuota', $data2);
        }else{
            $insert = $this->db->insert('pemesanan', $data1);
        }
        $response = $data1+$data2;
        if ($insert) {
            $this->response($response, REST_Controller::HTTP_CREATED);
        }
    }
}
