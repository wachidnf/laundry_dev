<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Testimoni extends REST_Controller {

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
        $id_testimoni = $this->get('id');
        if ($id_testimoni == '') {
            $testimoni = $this->db->get('testimoni')->result();
        } else {
            $this->db->where('id', $id_testimoni);
            $testimoni = $this->db->get('testimoni')->result();
        }

        if($testimoni){
            $this->response([
                'status'    => TRUE,
                'data'      => $testimoni
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response(array('status' => 'FALSE', REST_Controller::HTTP_NOT_FOUND));
        }
        
    }

    public function index_post()
    {
        $data = array(
            'customer_id'    => $this->post('customer_id'),
            'laundry_id'     => $this->post('laundry_id'),
            'message'        => $this->post('message'),
        );

        $insert = $this->db->insert('testimoni',$data);
        if ($insert) {
            $this->response($data, REST_Controller::HTTP_CREATED);
        }else {
            $this->response(array('status' => 'FALSE', REST_Controller::HTTP_BAD_REQUEST));
        }
    }
}
