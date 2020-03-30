<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaundryLayananModel extends CI_Model
{
    protected $table = 'laundry_layanan';

    public function find($id = null)
	{
        $this->db->select('p.*');
        $this->db->from($this->table.' p');
        $this->db->join('laundry l','l.id = p.laundry_id');
		$this->db->where('p.is_delete', 0);
		if($id != null){
			$this->db->where('p.id', $id);
		}
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
        $this->db->select('p.*');
        $this->db->from($this->table.' p');
        $this->db->join('laundry l','l.id = p.laundry_id');
        $this->db->where('p.is_delete', 0);
        $this->db->where('p.laundry_id', $this->session->userdata('laundry_id'));
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