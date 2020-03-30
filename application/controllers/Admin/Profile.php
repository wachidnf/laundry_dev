<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->check_admin();
        $this->laundry = $this->session->userdata('laundry_id');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('UserModel', 'user');
        $this->load->model('LaundryModel');
    }

    public function index()
    {
        $data['profile']    = $this->user->fetch_laundry($this->user_id);
        $this->render_admin('admin/profile/index',$data);
    }

    public function create()
    {
        $data = array(
            'user_id'       => $this->user_id,
            'name'          => htmlspecialchars($this->input->post('name')),
            'phone'         => htmlspecialchars($this->input->post('phone')),
            'address'       => htmlspecialchars($this->input->post('address')),
            'owner_name'    => htmlspecialchars($this->input->post('owner_name')),
            'no_ktp'        => htmlspecialchars($this->input->post('no_ktp'))
        );

        $result = $this->LaundryModel->insert_profile($data);
        $id = $this->db->insert_id();
        $this->update_ktp($id);
        $this->update_siup($id);
        $this->update_situ($id);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Profile Berhasil Disimpan');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Profile Gagal Disimpan');
        }
        redirect('Admin/Profile');
    }

    public function edit($id)
    {
        $data = array(
            'name'          => htmlspecialchars($this->input->post('name')),
            'phone'         => htmlspecialchars($this->input->post('phone')),
            'address'       => htmlspecialchars($this->input->post('address')),
            'owner_name'    => htmlspecialchars($this->input->post('owner_name')),
            'no_ktp'        => htmlspecialchars($this->input->post('no_ktp'))
        );
        $result = $this->LaundryModel->update($id,$data, null);
        $this->update_ktp($id);
        $this->update_siup($id);
        $this->update_situ($id);
        if($result == true){
            $this->session->set_flashdata('success', 'Data Profile Berhasil Diubah');
        }elseif($result == false){
            $this->session->set_flashdata('failed', 'Data Profile Gagal Diubah');
        }
        redirect('Admin/Profile');
    }

    public function update_ktp($id)
    {
        if($_FILES['foto_ktp']['name'] != ''){

			$data_ktp   = $this->user->fetch_laundry($id);
			$foto_ktp 	= $data_ktp->foto_ktp;
			$link_file 	= './assets/foto_ktp/'.$foto_ktp;
			
			unlink($link_file);

			$this->upload_update_ktp($id);
		}
    }

    public function upload_update_ktp($id)
    {
        $config['upload_path']    = storage_upload_ktp();
		$config['allowed_types']  = 'jpg|png|jpeg|pdf|docx';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["foto_ktp"]["name"] != '') {
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
              $ktp = array(
                  'foto_ktp'   => $foto_ktp
              );
              $data = array('upload_data' => $this->upload->data());
            }
            $result = $this->db->update('laundry', $ktp, array('id' => $id));
            return $result;
        }
	}

    public function update_siup($id)
    {
        if($_FILES['dokumen_siup']['name'] != ''){

			$data_siup = $this->user->fetch_laundry($id);
			$dokumen_siup 	= $data_siup->dokumen_siup;
			$link_file 	= './assets/dokumen_siup/'.$dokumen_siup;
			
			unlink($link_file);

			$this->upload_update_siup($id);
		}
    }

    public function upload_update_siup($id)
    {
        $config['upload_path']    = storage_upload_siup();
		$config['allowed_types']  = 'jpg|png|jpeg|pdf|docx';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["dokumen_siup"]["name"] != '') {
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
              $siup = array(
                  'dokumen_siup'   => $dokumen_siup
              );
              $data = array('upload_data' => $this->upload->data());
            }
            $result = $this->db->update('laundry', $siup, array('id' => $id));
            return $result;
        }
    }
    
    public function update_situ($id)
    {
        if($_FILES['dokumen_situ']['name'] != ''){

			$data_situ = $this->user->fetch_laundry($id);
			$dokumen_situ 	= $data_situ->dokumen_situ;
			$link_file 	= './assets/dokumen_situ/'.$dokumen_situ;
			
			unlink($link_file);

			$this->upload_update_situ($id);
		}
    }

    public function upload_update_situ($id)
    {
        $config['upload_path']    = storage_upload_situ();
		$config['allowed_types']  = 'jpg|png|jpeg|pdf|docx';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["dokumen_situ"]["name"] != '') {
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
              $situ = array(
                  'dokumen_situ'   => $dokumen_situ
              );
              $data = array('upload_data' => $this->upload->data());
            }
            $result = $this->db->update('laundry', $situ, array('id' => $id));
            return $result;
        }
    }
    
    public function update_imb($id)
    {
        if($_FILES['dokumen_imb']['name'] != ''){

			$data_imb = $this->user->fetch_laundry($id);
			$dokumen_imb 	= $data_imb->dokumen_imb;
			$link_file 	= './assets/dokumen_imb/'.$dokumen_imb;
			
			unlink($link_file);

			$this->upload_update_imb($id);
		}
    }

    public function upload_update_imb($id)
    {
        $config['upload_path']    = storage_upload_imb();
		$config['allowed_types']  = 'jpg|png|jpeg|pdf|docx';
		$config['overwrite']	  = true;
		$config['max_size']       = 5120; // 5MB
		$config['encrypt_name']   = TRUE;

        if ($_FILES["dokumen_imb"]["name"] != '') {
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
              $siup = array(
                  'dokumen_imb'   => $dokumen_imb
              );
              $data = array('upload_data' => $this->upload->data());
            }
            $result = $this->db->update('laundry', $siup, array('id' => $id));
            return $result;
        }
	}
}
?>