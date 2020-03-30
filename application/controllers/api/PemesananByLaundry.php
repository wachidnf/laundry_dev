<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class PemesananByLaundry extends REST_Controller {

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
        $laundry_id = $this->get('laundry_id');
        if ($laundry_id == '') {
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
            $this->db->where('laundry_id', $laundry_id);
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
}
