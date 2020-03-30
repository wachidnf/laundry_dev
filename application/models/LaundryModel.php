<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaundryModel extends CI_Model
{
    protected $table = 'laundry';

    public function find($id = null)
	{
        // TODO
	}

	public function insert($data)
	{
        $dataUser = array(
            'username'  => $data['username'],
            'password'  => $data['password'],
            'email'     => $data['email'],
            'enabled'   => 1
        );
        $this->db->insert('user', $dataUser);
        $id = $this->db->insert_id();
        
        $dataLaundry = array(
            'user_id'       => $id,
            'name'          => $data['name'],
            'phone'         => $data['phone'],
            'address'       => $data['address'],
            'owner_name'    => $data['owner_name'],
            'no_ktp'        => $data['no_ktp'],
            'foto_ktp'      => $data['foto_ktp'],
            'dokumen_siup'  => $data['dokumen_siup'],
            'dokumen_situ'  => $data['dokumen_situ'],
            'dokumen_imb'   => $data['dokumen_imb'],
            'logo'          => $data['logo']
        );
        $this->db->insert($this->table, $dataLaundry);
        return true;
    }
    
    public function insert_profile($data)
    {
        return $this->db->insert($this->table, $data);
    }

	public function update($id, $data, $dataUser)
	{
		$this->db->where('id',$id);
        $this->db->update($this->table, $data);
        if (isset($dataUser)) {
            $data2= array(
                'enabled'   => $dataUser['enabled']
            );
            $this->db->where('id', $dataUser['user_id']);
            $this->db->update('user', $data2);
        }
        return true;
    }

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function find_by(array $criteria = null, array $order_by = null, int $limit = null, int $offset = null)
	{
        $this->db->select('l.*, u.enabled');
        $this->db->from($this->table.' l');
        $this->db->join('user u','u.id = l.user_id');
        if (isset($order_by)) {
            foreach ($order_by as $k => $v) {
                $this->db->order_by($k, $v);
            }
        }

        if (isset($limit) && isset($offset)) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get();
	}

	public function count_total(array $criteria)
	{
		// TODO
	}
}
?>