<?php namespace App\Models;
use CodeIgniter\Model;

class Peminjaman_model extends Model
{
	protected $table     		 = 'tb_pinjam';
	protected $tablejoin  		 = 'tb_buku';
	protected $table_join		 = 'tbl_anggota';
	protected $table__join 		 = 'tb_user';

	public function getPeminjaman($id = false)
	{
		if(!$id){
			return $this->table('tb_pinjam')
						->select('*')
						->join('tb_buku','tb_pinjam.kd_buku = tb_buku.kd_buku')
						->join('tbl_anggota','tb_pinjam.nim = tbl_anggota.nim')
						->join('tb_user','tb_pinjam.id_user = tb_user.id_user')
						->where('tb_pinjam.stts_buku','Dipinjam')
						->get()
						->getResult();
		}else{
			return $this->table('tb_pinjam')
						->select('*')
						->join('tb_buku','tb_pinjam.kd_buku = tb_buku.kd_buku')
						->join('tbl_anggota','tb_pinjam.nim = tbl_anggota.nim')
						->join('tb_user','tb_pinjam.id_user = tb_user.id_user')
						->where('tb_pinjam.stts_buku','Dipinjam')
						->where('tb_pinjam.id_pinjam',$id)
						->get();
		}
	}

	public function getLaporan($id = false) {
		if(!$id){
			return $this->table('tb_pinjam')
						->select('*')
						->join('tb_buku','tb_pinjam.kd_buku = tb_buku.kd_buku')
						->join('tbl_anggota','tb_pinjam.nim = tbl_anggota.nim')
						->join('tb_user','tb_pinjam.id_user = tb_user.id_user')
						->get()
						->getResult();
		}else{
			return $this->table('tb_pinjam')
						->select('*')
						->join('tb_buku','tb_pinjam.kd_buku = tb_buku.kd_buku')
						->join('tbl_anggota','tb_pinjam.nim = tbl_anggota.nim')
						->join('tb_user','tb_pinjam.id_user = tb_user.id_user')
						->where('tb_pinjam.id_pinjam',$id)
						->get();
		}
	}
	public function savePeminjaman($data)
	{
		$query = $this->db->table('tb_pinjam')->insert($data);
        return $query;
	}

	public function updateData($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_pinjam' => $id]);
    }

    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['id_pinjam' => $id]);
    }

    public function getBuku(){
        $buku = $this->db->query("SELECT * FROM tb_buku")->getResultArray();
        return $buku;
    }

    public function getAnggota(){
        $anggota = $this->db->query("SELECT * FROM tbl_anggota")->getResultArray();
        return $anggota;
    }

    public function getUser(){
        $user = $this->db->query("SELECT * FROM tb_user")->getResultArray();
        return $user;
    }
}