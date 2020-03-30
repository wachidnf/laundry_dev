<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PemesananModel extends CI_Model
{
    protected $table = 'pemesanan';

    public function find($id = null)
    {
        // TODO
    }

    public function insert($data)
    {
        $data1 = array(
            'laundry_id'        => $data['laundry_id'],
            'customer_id'       => $data['customer_id'],
            'paket_id'          => $data['paket_id'],
            'layanan_id'        => $data['layanan_id'],
            'tanggal_masuk'     => $data['tanggal_masuk'],
            'tanggal_selesai'   => $data['tanggal_selesai'],
            'berat'             => $data['berat'],
            'jml_bayar'         => $data['jml_bayar'],
            'is_bayar'          => $data['is_bayar'],
            'bar_code'          => $data['bar_code']
        );
        if(!empty($data['kuota'])){
            $this->db->insert($this->table, $data1);

            $data2 = array(
                'customer_id'       => $data['customer_id'],
                'paket_id'          => $data['paket_id'],
                'kuota'             => $data['kuota']
            );
            return $this->db->insert('customer_kuota', $data2);
        }else{
            return $this->db->insert($this->table, $data1);
        }
        
        // return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
		return $this->db->delete($this->table);
    }

    public function find_by(array $criteria = null, array $order_by = null, int $limit = null, int $offset = null)
    {
        $this->db->select('p.*, l.id as laundry_id, c.id as customer_id, c.is_member, lp.id as paket_id, ll.id as layanan_id, ll.price as layanan_price, c.name as customer_name, lp.name as paket_name, ll.name as layanan_name, lpm.kuota, lpm.price as harga_member, lpn.price as harga_non_member');
		$this->db->from($this->table.' p');
		$this->db->join('laundry l','l.id = p.laundry_id','left');
		$this->db->join('customer c','c.id = p.customer_id','left');
		$this->db->join('laundry_paket lp','lp.id = p.paket_id','left');
        $this->db->join('laundry_layanan ll','ll.id = p.layanan_id','left');
        $this->db->join('laundry_paket_member lpm', 'lpm.laundry_paket_id = lp.id', 'left');
        $this->db->join('laundry_paket_non_member lpn', 'lpn.laundry_paket_id = lp.id', 'left');
        $this->db->where('p.laundry_id',$this->session->userdata('laundry_id'));
        $this->db->order_by('p.id', 'DESC');
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