<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class CustomerModel extends CI_Model
{
    protected $table = 'customer';

    public function find($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);

		return $this->db->get();
	}

	public function insert($data)
	{
		$dataUser = array(
			'username'	=> $data['username'],
			'password'	=> $data['password'],
			'email'		=> $data['email'],
			'enabled'   => 1
		);
		$this->db->insert('user', $dataUser);
		$id = $this->db->insert_id();

        $dataRole = array(
            'user_id'   => $id,
            'role_id'   => 3
        );
		$this->db->insert('user_role',$dataRole);
		
		$dataCustomer = array(
            'user_id'   => $id,
            'laundry_id'=> $data['laundry_id'],
            'name'      => $data['name'],
            'phone'     => $data['phone'],
            'address'   => $data['address'],
            'gender'    => $data['gender'],
            'is_member' => $data['is_member'],
            'is_delete' => 0
        );
		return $this->db->insert($this->table, $dataCustomer);
	}

	public function update($id, $data)
	{
		$this->db->where('id',$id);
        return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function find_by(array $criteria = null, array $order_by = null, int $limit = null, int $offset = null)
	{
        $this->db->select('c.*');
        $this->db->from($this->table.' c');
        $this->db->join('laundry l','l.id = c.laundry_id');
		$this->db->where('c.is_delete', 0);
		$this->db->where('laundry_id',$this->session->userdata('laundry_id'));
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

	public function count_total(array $criteria = null)
	{
		$data = $this->find_by($criteria)->num_rows();

		return $data;
	}
	
}
?>