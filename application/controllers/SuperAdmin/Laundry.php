<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Laundry extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_superadmin();
        $this->load->model('LaundryModel', 'laundry');
    }

    public function index()
    {
        $data['laundry'] = $this->laundry->find_by()->result();
        $this->render_superadmin('superadmin/laundry/index', $data);
    }

    public function create()
    {
        $dokumen_siup = $this->upload_siup();
        $dokumen_situ = $this->upload_situ();
        $dokumen_imb = $this->upload_imb();
        $foto_ktp = $this->upload_ktp();
        $logo = $this->upload_logo();
        $data = array(
            'username'      => htmlspecialchars($this->input->post('username')),
            'password'      => htmlspecialchars(md5($this->input->post('password'))),
            'email'         => htmlspecialchars($this->input->post('email')),
            'name'          => htmlspecialchars($this->input->post('name')),
            'phone'         => htmlspecialchars($this->input->post('phone')),
            'address'       => htmlspecialchars($this->input->post('address')),
            'owner_name'    => htmlspecialchars($this->input->post('owner_name')),
            'no_ktp'        => htmlspecialchars($this->input->post('no_ktp')),
            'foto_ktp'      => $foto_ktp,
            'dokumen_siup'  => $dokumen_siup,
            'dokumen_situ'  => $dokumen_situ,
            'dokumen_imb'   => $dokumen_imb,
            'logo'          => $logo
        );

        $result = $this->laundry->insert($data);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Laundry Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Laundry Gagal Disimpan');
        }

        redirect('SuperAdmin/Laundry');
    }

    public function upload_siup()
    {
        $config['upload_path']    = storage_upload_siup();
		$config['allowed_types']  = 'jpg|png|jpeg|docx|pdf|xls';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["dokumen_siup"]["name"]) {
            $config["file_name"] = $_FILES["dokumen_siup"]["name"];
            if ($_FILES["dokumen_siup"]["name"]) {
              $this->upload->initialize($config);
            } else {
              $this->loadl->library('upload', $config);
            }
            $dokumen_siup = $this->upload->do_upload('dokumen_siup');
            if (!$dokumen_siup) {
              $error = array('error' => $this->upload->display_errors());
            } else {
              $dokumen_siup = $this->upload->data("file_name");
              $data = array('upload_data' => $this->upload->data());
            }
        }

        return $dokumen_siup;
    }

    public function upload_situ()
    {
        $config['upload_path']    = storage_upload_situ();
		$config['allowed_types']  = 'jpg|png|jpeg|docx|pdf|xls';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["dokumen_situ"]["name"]) {
            $config["file_name"] = $_FILES["dokumen_situ"]["name"];
            if ($_FILES["dokumen_situ"]["name"]) {
              $this->upload->initialize($config);
            } else {
              $this->loadl->library('upload', $config);
            }
            $dokumen_situ = $this->upload->do_upload('dokumen_situ');
            if (!$dokumen_situ) {
              $error = array('error' => $this->upload->display_errors());
            } else {
              $dokumen_situ = $this->upload->data("file_name");
              $data = array('upload_data' => $this->upload->data());
            }
        }

        return $dokumen_situ;
    }

    public function upload_imb()
    {
        $config['upload_path']    = storage_upload_imb();
		$config['allowed_types']  = 'jpg|png|jpeg|docx|pdf|xls';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["dokumen_imb"]["name"]) {
            $config["file_name"] = $_FILES["dokumen_imb"]["name"];
            if ($_FILES["dokumen_imb"]["name"]) {
              $this->upload->initialize($config);
            } else {
              $this->loadl->library('upload', $config);
            }
            $dokumen_imb = $this->upload->do_upload('dokumen_imb');
            if (!$dokumen_imb) {
              $error = array('error' => $this->upload->display_errors());
            } else {
              $dokumen_imb = $this->upload->data("file_name");
              $data = array('upload_data' => $this->upload->data());
            }
        }

        return $dokumen_imb;
    }

    public function upload_ktp()
    {
        $config['upload_path']    = storage_upload_ktp();
		$config['allowed_types']  = 'jpg|png|jpeg|docx|pdf|xls';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["foto_ktp"]["name"]) {
            $config["file_name"] = $_FILES["foto_ktp"]["name"];
            if ($_FILES["foto_ktp"]["name"]) {
              $this->upload->initialize($config);
            } else {
              $this->loadl->library('upload', $config);
            }
            $foto_ktp = $this->upload->do_upload('foto_ktp');
            if (!$foto_ktp) {
              $error = array('error' => $this->upload->display_errors());
            } else {
              $foto_ktp = $this->upload->data("file_name");
              $data = array('upload_data' => $this->upload->data());
            }
        }

        return $foto_ktp;
    }

    public function upload_logo()
    {
        $config['upload_path']    = storage_upload_logo();
		$config['allowed_types']  = 'jpg|png|jpeg|docx|pdf|xls';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["logo"]["name"]) {
            $config["file_name"] = $_FILES["logo"]["name"];
            if ($_FILES["logo"]["name"]) {
              $this->upload->initialize($config);
            } else {
              $this->loadl->library('upload', $config);
            }
            $logo = $this->upload->do_upload('logo');
            if (!$logo) {
              $error = array('error' => $this->upload->display_errors());
            } else {
              $logo = $this->upload->data("file_name");
              $data = array('upload_data' => $this->upload->data());
            }
        }

        return $logo;
    }

    public function edit($id)
    {
        $data = array(
            'name'      => htmlspecialchars($this->input->post('name')),
            'phone'     => htmlspecialchars($this->input->post('phone')),
            'address'   => htmlspecialchars($this->input->post('address')),
            'owner_name'=> htmlspecialchars($this->input->post('owner_name'))
        );

        $dataUser = array(
            'user_id'   => $this->input->post('user_id'),
            'enabled'   => htmlspecialchars($this->input->post('enabled'))
        );
        
        $result = $this->laundry->update($id, $data, $dataUser);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Laundry Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Laundry Gagal Diubah');
        }

        redirect('SuperAdmin/Laundry');
    }

    public function aktifkan($id)
    {
        $data = array();

        $dataUser = array(
            'user_id'   => $this->input->post('user_id'),
            'enabled'   => 1
        );
        
        $result = $this->laundry->update($id, $data, $dataUser);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Laundry Berhasil Diaktifkan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Laundry Gagal Diaktifkan');
        }
        redirect('SuperAdmin/Laundry');

    }

    public function nonaktifkan($id,$user)
    {
        $data = array();

        $dataUser = array(
            'user_id'   => $user,
            'enabled'   => 0
        );
        
        $result = $this->laundry->update($id, $data, $dataUser);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Laundry Berhasil Dinonaktifkan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Laundry Gagal Dinonaktifkan');
        }
        redirect('SuperAdmin/Laundry');
    }
}
?>