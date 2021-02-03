<?php namespace App\Controllers;

use App\Models\Registerauth_model;
class Registerauth extends BaseController
{
	
	protected $Registerauth_model; 

	public function __construct()
	{
		helper('form'); 
		$this->Registerauth_model = new Registerauth_model();
	}

	public function register()
	{
		$data = array(
			'title' => 'Register',
			'validation'=>$this->validator,
			'tb_user'	=> $this->Registerauth_model->get_tb_user(),
			'isi'	=> 'v_register'
		);
		return view('layout/v_wrapper', $data);
	}

	public function save_register()
	{
		if ($this->request->getMethod()!=='post') {
			return redirect()->to(base_url('registerauth'));
		}

		// $validated = $this->validate([
		// 	'foto_user' => 'uploaded[foto_user]|mime_in[foto_user, image/jpg, image/jpeg, image/png, image/gif]|max_size[foto_user,4096]']);

		if ($this->validate([
			'nama_user'  => [
				'label' => 'Nama User',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong !!!'
				]
			],
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
			'repswd'  => [
				'label' => 'Retype Password',
				'rules' => 'required|matches[pswd]',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong !!!',
					'matches'  => '{field} Tidak Sama!!'
				]
			],
			'tlp'  => [
				'label' => 'No Handphone',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong !!!'
				]
			],
			// 'foto_user'  => [
			// 	'label' => 'Foto User',
			// 	'rules' => 'required',
			// 	'errors' => [
			// 		'required' => '{field} Tidak Boleh Kosong !!!'
			// 	]
			// ],
			'level'  => [
				'label' => 'Level',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong !!!'
				]
			],
		])) {
			// jika valid
			$file_gambar = $this->request->getFile('foto_user');
			$file_gambar->move(ROOTPATH.'public/foto');
			$data = array(
				'nama_user' => $this->request->getPost('nama_user'),
				'username' => $this->request->getPost('username'),
				'pswd' => password_hash($this->request->getPost('pswd'), PASSWORD_DEFAULT),
				'tlp' => $this->request->getPost('tlp'),
				'level' => $this->request->getPost('level'),
				'foto_user' => $file_gambar->getName(),
			);

			
			// print_r($validated);
			$this->Registerauth_model->save_register($data);
			session()->setFlashdata('pesan','Register Berhasil');
			return redirect()->to(base_url('Registerauth/register'));


			
			// echo "<pre>";
			// echo print_r($data);
		} else {
			// jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('Registerauth/register'));
		}
	}
}