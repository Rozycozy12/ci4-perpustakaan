<?php namespace App\Models;
use CodeIgniter\Model;

class Prodi_model extends Model
{
	protected $table = 'tb_prodi';

	public function getProdi($id = false)
	{
		if($id === false){
			return $this->findAll();
		}else{
			return $this->getWhere(['id_prodi' => $id]);
		}
	}
	public function saveProdi($data)
	{
		$query = $this->db->table($this->table)->insert($data);
		return $query;
	}

	public function updateProdi($data, $id)
	{
		$query = $this->db->table($this->table)->update($data, array('id_prodi' => $id));
		return $query;
	}
	public function deleteProdi($id)
	{
		$query = $this->db->table($this->table)->delete(array('id_prodi' => $id));
		return $query;
	}
}