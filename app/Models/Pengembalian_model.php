<?php namespace App\Models;
use CodeIgniter\Model;

class Pengembalian_model extends Model
{
	protected $table     		 = 'tb_kembali';
	protected $tablejoin  		 = 'tb_pinjam';

	public function getPengembalian($id = false)
	{
		if($id === false){
			return $this->table('tb_kembali')
						->select('*')
						->join('tb_pinjam','tb_pinjam.id_pinjam = tb_kembali.id_pinjam')
						->join('tb_buku','tb_pinjam.kd_buku = tb_buku.kd_buku')
						->join('tbl_anggota','tb_pinjam.nim = tbl_anggota.nim')
						->join('tb_user','tb_pinjam.id_user = tb_user.id_user')
						->get()
						->getResult();
		}else{
			return $this->table('tb_kembali')
						->select('*')
						->join('tb_pinjam','tb_pinjam.id_pinjam = tb_kembali.id_pinjam')
						->join('tb_buku','tb_pinjam.kd_buku = tb_buku.kd_buku')
						->join('tbl_anggota','tb_pinjam.nim = tbl_anggota.nim')
						->join('tb_user','tb_pinjam.id_user = tb_user.id_user')
						->where('tb_kembali.id_kembali',$id)
						->get()
						->getResult();
		}
	}

	public function getDataPinjam($id=false){
					if($id){
					return $this->table('tb_pinjam')
						->select('*')
						->where('id_pinjam',$id)
						->get()
						->getRow();
					}else{
						return $this->table('tb_kembali')
						->query("SELECT * FROM tb_kembali RIGHT JOIN  tb_pinjam ON tb_kembali.id_pinjam = tb_pinjam.id_pinjam WHERE tb_pinjam.stts_buku = 'Dipinjam'")
						// ->get()
						->getResult();
					}	
	}

	public function savePengembalian($data)
	{
		$query = $this->db->table('tb_kembali')->insert($data);
        return $query;
	}

	public function updateData($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_kembali' => $id]);
    }

    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['id_kembali' => $id]);
    }

    // public function getPengembalian(){
    //     $pengembalian = $this->db->query("SELECT * FROM tb_kembali")->getResultArray();
    //     return $pengembalian;
    // }
}