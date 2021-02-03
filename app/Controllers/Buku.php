<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Buku_model;

class Buku extends Controller
{
	public function index()
	{
		$model = new Buku_model();
		$data = array(
			'title' => 'Daftar Buku',
			'isi'	=> 'buku/buku_view',
			'buku' => $model->getBuku(),
		);
		return view('layout/v_wrapper',$data);
	}

	public function buku_admin()
	{
		$model = new Buku_model();
		$data = array(
			'title' => 'Daftar Buku',
			'isi'	=> 'buku/buku_view_admin',
			'buku' => $model->getBuku(),
		);
		return view('layout/v_wrapper',$data);
	}

	public function add_new()
	{
		// echo view('add_artikel_view');
		$data = array(
			'$title' => 'Tambah Daftar Buku' , 
		);

		return view('buku/add_buku_view',$data);
	}

	public function save()
	{
		$model = new Buku_model();
		$data = array(
			'kd_buku' => $this->request->getPost('kd_buku'),
			'jdl_buku' => $this->request->getPost('jdl_buku'),
			'penulis_buku' => $this->request->getPost('penulis_buku'),
			'penerbit_buku' => $this->request->getPost('penerbit_buku'),
			'thn_terbit' => $this->request->getPost('thn_terbit'),
			'stok' => $this->request->getPost('stok'),
		);
		$model->saveBuku($data);
		return redirect()->to('/buku');
	}

	public function edit($id)
	{
		$model = new Buku_model();
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		$data = array(
			'$title' => 'Edit Data Buku' , 
			'buku' => $model->getBuku($id)->getRow(),
		);

		return view('buku/edit_buku_view',$data);
	}

	public function update()
	{
		$model = new Buku_model();
		$id = $this->request->getPost('kd_buku');
		$data = array (
			'kd_buku' => $this->request->getPost('kd_buku'),
			'jdl_buku' => $this->request->getPost('jdl_buku'),
			'penulis_buku' => $this->request->getPost('penulis_buku'),
			'penerbit_buku' => $this->request->getPost('penerbit_buku'),
			'thn_terbit' => $this->request->getPost('thn_terbit'),
			'stok' => $this->request->getPost('stok'),
		);
		$model->updateBuku($data, $id);
		return redirect()->to('/buku');
	}

	public function delete($id)
	{
		$model = new Buku_model();
		$model->deleteBuku($id);
		return redirect()->to('/buku');
	}
}