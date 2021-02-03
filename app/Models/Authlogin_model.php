<?php
namespace App\Models;
use CodeIgniter\Model;

class Authlogin_model extends Model
{

	protected $table ='tb_user';
	protected $allowFields = ['id_user','nama_user','username','pswd','tlp','level'];
	public function login($username,$pswd)
	{
		return $this->db->table('tb_user')->where([
			'username' => $username,
			'pswd'	   => $pswd,
		])->get()->getRowArray();
	}
}