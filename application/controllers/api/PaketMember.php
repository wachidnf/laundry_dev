<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class PaketMember extends REST_Controller {

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
        $id_paket = $this->get('paket_id');
        if ($id_paket == '') {
            $this->db->select('p.id as paket_id, p.name, p.created_at, p.updated_at, pm.kuota, pm.price');
            $this->db->from('laundry_paket p');
            $this->db->join('laundry l','l.id = p.laundry_id');
            $this->db->join('laundry_paket_member pm', 'pm.laundry_paket_id = p.id');
            $laundry_paket = $this->db->get()->result();
        } else {
            $this->db->select('p.id as paket_id, p.name, p.created_at, p.updated_at, pm.kuota, pm.price');
            $this->db->from('laundry_paket p');
            $this->db->join('laundry l','l.id = p.laundry_id');
            $this->db->join('laundry_paket_member pm', 'pm.laundry_paket_id = p.id');
            $this->db->where('p.id', $id_paket);
            $laundry_paket = $this->db->get()->result();
        }

        if($laundry_paket){
            $this->response([
                'status'    => TRUE,
                'data'      => $laundry_paket
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response(array('status' => 'FALSE', REST_Controller::HTTP_NOT_FOUND));
        }
    }
}
