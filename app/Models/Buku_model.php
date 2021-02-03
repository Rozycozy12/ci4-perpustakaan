<?php namespace App\Models;
use CodeIgniter\Model;

class Buku_model extends Model
{
	protected $table = 'tb_buku';

	public function getBuku($id = false)
	{
		if($id === false){
			return $this->findAll();
		}else{
			return $this->getWhere(['kd_buku' => $id]);
		}
	}
	public function saveBuku($data)
	{
		$query = $this->db->table($this->table)->insert($data);
		return $query;
	}

	public function updateBuku($data, $id)
	{
		$query = $this->db->table($this->table)->update($data, array('kd_buku' => $id));
		return $query;
	}
	public function deleteBuku($id)
	{
		$query = $this->db->table($this->table)->delete(array('kd_buku' => $id));
		return $query;
	}
}