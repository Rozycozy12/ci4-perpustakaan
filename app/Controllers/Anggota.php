<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Anggota_model;
use App\Models\Prodi_model;

class Anggota extends Controller
{
	public function index()
	{
		$model = new Anggota_model();
		$data = array(
			'title' => 'Daftar Anggota Perpustakaan',
			'isi'	=> 'anggota/anggota_view',
			'anggota' => $model->getAnggota(),
		);
		return view('layout/v_wrapper',$data);
	}

	public function view_admin()
	{
		$model = new Anggota_model();
		$data = array(
			'title' => 'Daftar Anggota Perpustakaan',
			'isi'	=> 'anggota/anggota_view_admin',
			'anggota' => $model->getAnggota(),
		);
		return view('layout/v_wrapper',$data);
	}

	public function add_new()
	{
		// echo view('add_artikel_view');
		$Model   	= new Anggota_model();
		$model_p 	= new Prodi_model();
		$data = array (
			'$title' => 'Tambah Daftar Anggota' , 
			'prodi'		=> $model_p->getProdi()
		);
		return view('anggota/add_anggota_view',$data);
	}

	public function save()
	{
		$model = new Anggota_model();
		$data = array(
			'nim' => $this->request->getPost('nim'),
			'nama_anggota' => $this->request->getPost('nama_anggota'),
			'id_prodi' => $this->request->getPost('id_prodi'),
			'tlp' => $this->request->getPost('tlp'),
		);
		// print_r($data);
		$model->saveAnggota($data);
		return redirect()->to('/anggota');
	}

	public function edit($id)
	{
		$model = new Anggota_model();
		
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		$data = array(
			'$title' => 'Edit Data Anggota' , 
			'anggota' => $model->getAnggota($id)->getRow(),
		);

		return view('anggota/edit_anggota_view',$data);
	}

	public function update()
	{
		$model = new Anggota_model();
		$id = $this->request->getPost('nim');
		$data = array (
		'nim' => $this->request->getPost('nim'),
			'nama_anggota' => $this->request->getPost('nama_anggota'),
			'id_prodi' => $this->request->getPost('id_prodi'),
			'tlp' => $this->request->getPost('tlp'),
		);
		$model->updateAnggota($data, $id);
		return redirect()->to('/anggota');
	}

	public function delete($id)
	{
		$model = new Anggota_model();
		$model->deleteAnggota($id);
		return redirect()->to('/anggota');
	}
}