<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Prodi_model;

class Prodi extends Controller
{
	public function index()
	{
		$model = new Prodi_model();
		$data = array(
			'title' => 'Daftar Prodi',
			'isi'	=> 'prodi/prodi_view',
			'prodi' => $model->getProdi(),
		);
		return view('layout/v_wrapper',$data);
	}

	public function prodi_user()
	{
		$model = new Prodi_model();
		$data = array(
			'title' => 'Daftar Prodi',
			'isi'	=> 'prodi/prodi_view_user',
			'prodi' => $model->getProdi(),
		);
		return view('layout/v_wrapper',$data);
	}

	public function add_new()
	{
		// echo view('add_artikel_view');
		$data = array(
			'$title' => 'Tambah Daftar Prodi' , 
		);

		return view('prodi/add_prodi_view',$data);
	}

	public function save()
	{
		$model = new Prodi_model();
		$data = array(
			'id_prodi' => $this->request->getPost('id_prodi'),
			'nama_prodi' => $this->request->getPost('nama_prodi'),
		);
		$model->saveProdi($data);
		return redirect()->to('/prodi');
	}

	public function edit($id)
	{
		$model = new Prodi_model();
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		$data = array(
			'$title' => 'Edit Data Prodi' , 
			'prodi' => $model->getProdi($id)->getRow(),
		);

		return view('prodi/edit_prodi_view',$data);
	}

	public function update()
	{
		$model = new Prodi_model();
		$id = $this->request->getPost('id_prodi');
		$data = array (
			'id_prodi' => $this->request->getPost('id_prodi'),
			'nama_prodi' => $this->request->getPost('nama_prodi'),
		);
		$model->updateProdi($data, $id);
		return redirect()->to('/prodi');
	}

	public function delete($id)
	{
		$model = new Prodi_model();
		$model->deleteProdi($id);
		return redirect()->to('/prodi');
	}
}