<?php namespace App\Controllers;

use App\Models\Authlogin_model;
class Authlogin extends BaseController
{
	public function __construct()
	{
		helper('form'); 
		$this->Authlogin_model = new Authlogin_model();
	}
	public function login()
	{
		$data = array(
			'$title' => 'Login' , 
		);

		return view('v_login',$data);
	}

	public function cek_login()
	{
		if ($this->validate([
			'username'  => [
				'label' => 'Username',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong !!!'
				]
			],
			'pswd'  => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong !!!'
				]
			],
		])) {

			// jika valid
			// $username = $this->request->getPost('username');
			// $pswd     = $this->request->getPost('pswd');
			// $cek      = $this->Auth_model->login($username, $pswd);
			// if ($cek) {
			// 	// jika datanya cocok
			// 	session()->set('log', true);
			// 	session()->set('nm_lengkap', $cek['nm_lengkap']);
			// 	session()->set('username', $cek['username']);
			// 	session()->set('level', $cek['level']);
			// 	session()->set('foto_user', $cek['foto_user']);

			// 	// login sukses
			// 	return redirect()->to(base_url('home'));

			$model = new Authlogin_model();
			$username = $this->request->getPost('username');
			$pswd     = $this->request->getPost('pswd');
			$cek      = $model->where('username', $username)->first();

			if($cek){
				$pass = $cek['pswd'];
				$verifikasi_password = password_verify($pswd, $pass);
				// print_r($pass);
				// echo "<hr>";
				// print_r($pswd);
				if ($verifikasi_password) {
					$ses_data = [
						'id_user'		=> $cek['id_user'],
						'nama_user'		=> $cek['nama_user'],
						'username'		=> $cek['username'],
						'tlp'			=> $cek['tlp'],
						'level'			=> $cek['level'],
						'foto_user'		=> $cek['foto_user'],
						'log'			=> TRUE
				// session()->set('log', true),
				// session()->set('id_user', $cek['id_user']),
				// session()->set('nama_user', $cek['nama_user']),
				// session()->set('username', $cek['username']),
				// session()->set('tlp', $cek['tlp']),
				// session()->set('level', $cek['level']),
				// session()->set('foto_user', $cek['foto_user']),

					];
					session()->set($ses_data);
					return redirect()->to(base_url('home',));
					# code...
				}else {
				// jika datanya tidak cocok
				session()->setFlashdata('pesan', 'Login Gagal !! Username atau Password Salah.');
				return redirect()->to(base_url('authlogin/login'));
			}
			
			// } else {
			// 	// jika datanya tidak cocok
			// 	session()->setFlashdata('pesan', 'Login Gagal !! Username atau Password Salah.');
			// 	return redirect()->to(base_url('auth/login'));
			// }
		} else {
			// jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('authlogin/login'));
		}
	}
}

	public function logout()
	{
		session()->remove('log');
		session()->remove('nama_user');
		session()->remove('username');
		session()->remove('tlp');
		session()->remove('level');
		session()->remove('foto_user');

		session()->setFlashdata('pesan', 'Logout Sukses !!');
				return redirect()->to(base_url('authlogin/login'));
	}

	function has(){
		echo password_hash("rudi", PASSWORD_DEFAULT);
	}
}