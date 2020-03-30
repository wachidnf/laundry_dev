<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestimoniModel extends CI_Model
{
    protected $table = 'testimoni';

    public function find($id = null)
	{
        $this->db->select('t.*, c.name as customer_name, l.name as laundry_name');
        $this->db->from($this->table.' t');
        $this->db->join('laundry l','l.id = t.laundry_id');
        $this->db->join('customer c','c.id = t.customer_id');
		$this->db->where('t.is_delete', 0);

		return $this->db->get();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
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
        $this->db->select('t.*, c.name as customer_name, l.name as laundry_name');
        $this->db->from($this->table.' t');
        $this->db->join('laundry l','l.id = t.laundry_id');
        $this->db->join('customer c','c.id = t.customer_id');
		$this->db->where('t.is_delete', 0);
		$this->db->where('t.laundry_id',$this->session->userdata('laundry_id')?$this->session->userdata('laundry_id'):null);
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