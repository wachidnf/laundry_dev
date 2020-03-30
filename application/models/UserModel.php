<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class UserModel extends CI_Model
{
    protected $table = 'user';
    public function get($username)
    {
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $this->db->where('enabled',1);
        $result = $this->db->get($this->table)->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }

    public function fetch_roles($user_id)
    {
        $this->db->select('role.*');
        $this->db->from($this->table.' user');
        $this->db->join('user_role', 'user_role.user_id = user.id', 'LEFT');
        $this->db->join('role', 'role.id = user_role.role_id', 'LEFT');
        $this->db->where('user.id', $user_id);

        return $this->db->get()->result();
    }

    public function fetch_laundry($user_id)
    {
        $this->db->select('l.*');
        $this->db->from($this->table.' u');
        $this->db->join('laundry l', 'l.user_id = u.id');
        $this->db->where('u.id',$user_id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $dataUser = array(
            'username'  => $data['username'],
            'password'  => $data['password'],
            'email'     => $data['email'],
            'created_at'=> date('Y-m-d H:i:s'),
            'enabled'   => 1
        );

        $this->db->insert($this->table,$dataUser);
        $id = $this->db->insert_id();

        $dataRole = array(
            'user_id'   => $id,
            'role_id'   => 2
        );
        $this->db->insert('user_role',$dataRole);
        return true;
    }

    public function find_by(array $criteria = null, array $order_by = null, int $limit = null, int $offset = null)
	{
        $this->db->select('*');
        $this->db->from($this->table.' u');
        $this->db->join('user_role ur','ur.user_id = u.id');
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
}
?>