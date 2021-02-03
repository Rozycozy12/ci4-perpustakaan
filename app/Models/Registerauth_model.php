<?php
namespace App\Models;
use CodeIgniter\Model;

class Registerauth_model extends Model
{
	protected $table ='tb_user';
	protected $allowFields = ['id_user','nama_user','username','pswd','tlp','level','foto_user'];

	public function __construct() {
		parent::__construct();
		$db = \Config\Database::connect();
		$this->table = $this->db->table('tb_user');
	}

	public function get_tb_user()
	{
		return $this->db->table('tb_user')->get()->getResultArray();
	}

	public function save_register($data)
	{
		return $this->db->table('tb_user')->insert($data);
	}

}