<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;

class User extends Controller
{
	public function index()
	{
		$model = new User_model();
		$id=session()->get('id_user');
		$data = [
			'title' => 'Profile User',
			'isi'	=> 'user/user_view',
			'user' => $model->getUser(),
		];
		return view('layout/v_wrapper',$data);
	}


	public function edit($id)
	{
		$model = new User_model();
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		$data = array(
			'$title' => 'Edit Data User' , 
			'user' => $model->getUser($id)->getRow(),
		);

		return view('user/edit_user_view',$data);
	}

	public function update()
	{
		$model = new User_model();
		$id = $this->request->getPost('id_user');
		$data = array (
			'nama_user' => $this->request->getPost('nama_user'),
			'username' => $this->request->getPost('username'),
			'pswd' => $this->request->getPost('pswd'),
			'tlp' => $this->request->getPost('tlp'),
			'level' => $this->request->getPost('level'),
		);
		$model->updateUser($data, $id);
		return redirect()->to('/user');
	}


	public function ubah($id)
	{
		$model = new User_model();
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		$data = array(
			'$title' => 'Edit Data User' , 
			'user' => $model->getUser($id)->getRow(),
		);

		return view('user/ubah_user_view',$data);
	}

	public function ganti()
	{
		$model = new User_model();
		$id = $this->request->getPost('id_user');
		$data = array (
			'nama_user' => $this->request->getPost('nama_user'),
			'username' => $this->request->getPost('username'),
			'pswd' => $this->request->getPost('pswd'),
			'tlp' => $this->request->getPost('tlp'),
			'level' => $this->request->getPost('level'),
		);
		$model->updateUser($data, $id);
		return redirect()->to('/user/profil');
	}
	public function delete($id)
	{
		$model = new User_model();
		$model->deleteUser($id);
		return redirect()->to('/user');
	}
	public function profil()
	{
		$model = new User_model();
		$id=session()->get('id_user');
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		{
		$data = [
			'title' => 'Profile',
			'isi'	=> 'user/profile_user_view',
			'user' => $model->getUser($id)->getRow(),
		];
		return view('layout/v_wrapper', $data);
	}
}
}