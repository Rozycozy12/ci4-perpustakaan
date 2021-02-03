<?php namespace App\Models;
use CodeIgniter\Model;

class Anggota_model extends Model
{
	protected $table 			= 'tbl_anggota';
	protected $tablejoin  		= 'tb_prodi';


	public function getAnggota($id = false)
	{
		// if($id === false){
		// 	return $this->findAll();
		// }else{
		// 	return $this->getWhere(['nim' => $id]);
		// }
			if($id === false){
			return $this->table('tbl_anggota')
						->select('*')
						->join('tb_prodi','tb_prodi.id_prodi = tbl_anggota.id_prodi')
						->get()
						->getResultArray();
		}else{
			return $this->table('tbl_anggota')
						->select('*')
						->join('tb_prodi','tb_prodi.id_prodi = tbl_anggota.id_prodi')
						->where('tbl_anggota.nim',$id)
						->get()
						->getResultArray();
		}
	}

	public function saveAnggota($data)
	{
		$query = $this->db->table('tbl_anggota')->insert($data);
        return $query;
	}

	public function updateAnggota($data, $id)
	{
		$query = $this->db->table($this->table)->update($data, array('nim' => $id));
		return $query;
	}
	public function deleteAnggota($id)
	{
		$query = $this->db->table($this->table)->delete(array('nim' => $id));
		return $query;
	}
}