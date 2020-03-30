<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller {

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
        $id_laundry = $this->get('id');
        if ($id_laundry == '') {
            $laundry = $this->db->get('laundry')->result();
        } else {
            $this->db->where('id', $id_laundry);
            $laundry = $this->db->get('laundry')->result();
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
        $dataUser = array(
            'username'  => $this->post('username'),
            'password'  => md5($this->post('password')),
            'email'     => $this->post('email'),
            'created_at'=> date('Y-m-d H:i:s'),
            'enabled'   => 1
        );

        $this->db->insert('user',$dataUser);
        $id = $this->db->insert_id();

        $dataRole = array(
            'user_id'   => $id,
            'role_id'   => 3
        );
        $this->db->insert('user_role',$dataRole);

        $dataCustomer = array(
            'user_id'   => $id,
            'laundry_id'=> $this->post('laundry_id'),
            'name'      => $this->post('name'),
            'phone'     => $this->post('phone'),
            'address'   => $this->post('address'),
            'gender'    => $this->post('gender'),
            'is_member' => $this->post('is_member'),
            'is_delete' => 0
        );
        $insert = $this->db->insert('customer',$dataCustomer);
        $response = $dataUser+$dataCustomer;
        if ($insert) {
            $this->response($response, REST_Controller::HTTP_CREATED);
        }
    }
}