<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Customer extends REST_Controller {

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
        $id_customer = $this->get('id');
        if ($id_customer == '') {
            $customer = $this->db->get('customer')->result();
        } else {
            $this->db->where('id', $id_customer);
            $customer = $this->db->get('customer')->result();
        }

        if($customer){
            $this->response([
                'status'    => TRUE,
                'data'      => $customer
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response(array('status' => 'FALSE', REST_Controller::HTTP_NOT_FOUND));
        }
    }

    public function index_put()
    {
        $id_customer = $this->put('id');
        $data = array(
            'id'            => $this->put('id'),
            'name'          => $this->put('name'),
            'phone'         => $this->put('phone'),
            'address'       => $this->put('address'),
            'gender'        => $this->put('gender'),
            'is_member'     => $this->put('is_member')
        );
        $this->db->where('id', $id_customer);
        $update = $this->db->update('customer', $data);
        if ($update) {
            $this->response($data,  REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'FALSE', REST_Controller::HTTP_NOT_FOUND));
        }
    }
}
