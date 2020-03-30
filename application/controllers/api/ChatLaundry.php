<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Chat extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->methods['index_get']['limit'] = 1; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_put']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->database();
    }

    public function index_get() 
    {
        $user_id = $this->get('id');
        if ($user_id == '') {
            // $laundry = $this->db->get('laundry')->result();
            $this->db->select('ch.*, lpengirim.name as laundry_pengirim, lpenerima.name as laundry_penerima, cpengirim.name as customer_pengirim, cpenerima.name as customer_penerima');
            $this->db->from('chat ch');
            $this->db->join('user upengirim','ch.pengirim = upengirim.id','left');
            $this->db->join('user upenerima','ch.penerima = upenerima.id','left');
            $this->db->join('laundry lpengirim','lpengirim.user_id = upengirim.id', 'left');
            $this->db->join('laundry lpenerima','lpenerima.user_id = upenerima.id', 'left');
            $this->db->join('customer cpengirim', 'cpengirim.user_id = upengirim.id', 'left');
            $this->db->join('customer cpenerima', 'cpenerima.user_id = upenerima.id', 'left');
            $this->db->group_by('cpengirim.user_id');
            $this->db->order_by('ch.waktu', 'ASC');
            $laundry = $this->db->get()->result();

        } else {
            // $this->db->where('id', $id_laundry);
            // $laundry = $this->db->get('laundry')->result();
            $this->db->select('ch.*, lpengirim.name as laundry_pengirim, lpenerima.name as laundry_penerima, cpengirim.name as customer_pengirim, cpenerima.name as customer_penerima');
            $this->db->from('chat ch');
            $this->db->join('user upengirim','ch.pengirim = upengirim.id','left');
            $this->db->join('user upenerima','ch.penerima = upenerima.id','left');
            $this->db->join('laundry lpengirim','lpengirim.user_id = upengirim.id', 'left');
            $this->db->join('laundry lpenerima','lpenerima.user_id = upenerima.id', 'left');
            $this->db->join('customer cpengirim', 'cpengirim.user_id = upengirim.id', 'left');
            $this->db->join('customer cpenerima', 'cpenerima.user_id = upenerima.id', 'left');
            $this->db->where('lpenerima.user_id', $user_id);
            $this->db->group_by('cpengirim.user_id');
            $this->db->order_by('ch.waktu', 'ASC');
            $laundry = $this->db->get()->result();
        }

        if($laundry){
            $this->response([
                'status'    => TRUE,
                'data'      => $laundry
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response(array('status' => 'FALSE', REST_Controller::HTTP_NOT_FOUND));
        }
    }

    public function index_post()
    {
        $data = array(
            'pesan'     => $this->post('pesan'),
            'pengirim'  => $this->post('pengirim'),
            'penerima'  => $this->post('penerima')
        );

        $insert = $this->db->insert('chat',$data);

        if ($insert) {
            $this->response($data, REST_Controller::HTTP_CREATED);
        }
    }
}