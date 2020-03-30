<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaundryPaketModel extends CI_Model
{
    protected $table = 'laundry_paket';

    public function find($id = null)
	{
        // TODO
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function insert_member($data)
	{
		$data1 = array(
			'laundry_id'	=> $data['laundry_id'],
			'name'			=> $data['name'],
		);
		$this->db->insert($this->table, $data1);
		$id = $this->db->insert_id();

		$data2 = array(
			'laundry_paket_id'	=> $id,
			'kuota'				=> $data['kuota'],
			'price'				=> $data['price']
		);
		return $this->db->insert('laundry_paket_member', $data2);
	}

	public function insert_non_member($data)
	{
		$data1 = array(
			'laundry_id'	=> $data['laundry_id'],
			'name'			=> $data['name'],
		);
		$this->db->insert($this->table, $data1);
		$id = $this->db->insert_id();

		$data2 = array(
			'laundry_paket_id'	=> $id,
			'price'				=> $data['price']
		);
		return $this->db->insert('laundry_paket_non_member', $data2);
	}

	public function update($id, $data)
	{
		$this->db->where('id',$id);
        return $this->db->update($this->table, $data);
	}

	public function update_member($id, $data)
	{
		$data1 = array(
			'name'	=> $data['name']
		);
		$this->db->where('id', $id);
		$this->db->update($this->table, $data1);

		$data2 = array(
			'kuota'	=> $data['kuota'],
			'price'	=> $data['price']
		);
		$this->db->where('laundry_paket_id', $id);
		return $this->db->update('laundry_paket_member',$data2);
	}

	public function update_non_member($id, $data)
	{
		$data1 = array(
			'name'	=> $data['name']
		);
		$this->db->where('id', $id);
		$this->db->update($this->table, $data1);

		$data2 = array(
			'price'	=> $data['price']
		);
		$this->db->where('laundry_paket_id', $id);
		return $this->db->update('laundry_paket_non_member',$data2);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function find_by_member(array $criteria = null, array $order_by = null, int $limit = null, int $offset = null)
	{
        $this->db->select('p.*, pm.kuota, pm.price');
        $this->db->from($this->table.' p');
		$this->db->join('laundry l','l.id = p.laundry_id');
		$this->db->join('laundry_paket_member pm', 'pm.laundry_paket_id = p.id');
		$this->db->where('p.laundry_id', $this->session->userdata('laundry_id'));
		if(isset($criteria['id']) && $criteria['id'] != ''){
			$this->db->where("p.id", $criteria['id']);
		}
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

	public function find_by_non_member(array $criteria = null, array $order_by = null, int $limit = null, int $offset = null)
	{
        $this->db->select('p.*, pn.price');
        $this->db->from($this->table.' p');
		$this->db->join('laundry l','l.id = p.laundry_id');
		$this->db->join('laundry_paket_non_member pn', 'pn.laundry_paket_id = p.id');
		$this->db->where('p.laundry_id', $this->session->userdata('laundry_id'));
		if(isset($criteria['id']) && $criteria['id'] != ''){
			$this->db->where("p.id", $criteria['id']);
		}
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