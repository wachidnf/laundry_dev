<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChatModel extends CI_Model
{
    protected $table = 'chat';

    public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id',$id);
        return $this->db->update($this->table, $data);
    }

    public function find(array $criteria = null)
    {
        $this->db->distinct();
        $this->db->select('ch.*, cpengirim.name as customer_pengirim, upengirim.id as customer_id');
        $this->db->from($this->table.' ch');
        $this->db->join('user upengirim','ch.pengirim = upengirim.id','left');
        $this->db->join('user upenerima','ch.penerima = upenerima.id','left');
        $this->db->join('laundry lpengirim','lpengirim.user_id = upengirim.id', 'left');
        $this->db->join('laundry lpenerima','lpenerima.user_id = upenerima.id', 'left');
        $this->db->join('customer cpengirim', 'cpengirim.user_id = upengirim.id', 'left');
        $this->db->join('customer cpenerima', 'cpenerima.user_id = upenerima.id', 'left');
        if(isset($criteria['id_customer']) && $criteria['id_customer'] != ''){
            $this->db->where("ch.pengirim", $criteria['id_customer']);
            $this->db->or_where("ch.penerima", $criteria['id_customer']);
        }
        $this->db->order_by('ch.waktu', 'ASC');
        return $this->db->get();
    }
    
    public function find_by(array $criteria = null, int $limit = null, int $offset = null)
	{
        $this->db->select('ch.*, lpengirim.name as laundry_pengirim, lpenerima.name as laundry_penerima, cpengirim.name as customer_pengirim, cpenerima.name as customer_penerima');
        $this->db->from($this->table.' ch');
        $this->db->join('user upengirim','ch.pengirim = upengirim.id','left');
        $this->db->join('user upenerima','ch.penerima = upenerima.id','left');
        $this->db->join('laundry lpengirim','lpengirim.user_id = upengirim.id', 'left');
        $this->db->join('laundry lpenerima','lpenerima.user_id = upenerima.id', 'left');
        $this->db->join('customer cpengirim', 'cpengirim.user_id = upengirim.id', 'left');
        $this->db->join('customer cpenerima', 'cpenerima.user_id = upenerima.id', 'left');
        $this->db->where('lpenerima.user_id', $this->session->userdata('user_id'));
        $this->db->group_by('cpengirim.user_id');
        $this->db->order_by('ch.waktu', 'ASC');

        if (isset($limit) && isset($offset)) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get();
	}
}
?>