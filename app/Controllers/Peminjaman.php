<?php namespace App\Controllers;

use App\Models\Peminjaman_model;
use App\Models\Buku_model;
use App\Models\Anggota_model;
use App\Models\User_model;
use CodeIgniter\Controllers;
class Peminjaman extends BaseController{


	public function index(){
		$model = new Peminjaman_model();
		$data  = [
				'title' 	 => 'Data Peminjaman Buku',
 				'isi'		 => 'peminjaman/v_data',
 				'peminjaman' => $model->getPeminjaman()
		];
		
		return view('layout/v_wrapper',$data);
	}

		public function add_new(){
		$Model   	= new Peminjaman_model();
		$model_b 	= new Buku_model();
		$model_a	= new Anggota_model();
		$model_u	= new User_model();
		$data = array (
			'title'		=> 'Tambah Data Peminjaman',
			'buku'		=> $model_b->getBuku(),
			'anggota'	=> $model_a->getAnggota(),
			'user'		=> $model_u->getUser()
		);
		return view('peminjaman/v_pinjam',$data);
	}

	public function laporan(){
		$model = new Peminjaman_model();
		$data  = [
				'title' 	 => 'Laporan Peminjaman Buku',
 				'isi'		 => 'peminjaman/v_laporan',
 				'peminjaman' => $model->getLaporan()
		];
		
		return view('layout/v_wrapper',$data);
	}

	public function save()
	{
		$model = new Peminjaman_model();
		$data = [
			'kd_buku'			=> $this->request->getPost('kd_buku'),
			'nim'				=> $this->request->getPost('nim'),
			'id_user'			=> session()->get('id_user'),
			'tgl_kembali'		=> date('Y-m-d', strtotime('+6 days',strtotime(date('Y-m-d'))))
		];
		// print_r($data);
		$model->savePeminjaman($data);
		return redirect()->to('/peminjaman');
	}

	public function edit($id)
	{
		$model = new Peminjaman_model();
		$model_b 	= new Buku_model();
		$model_a	= new Anggota_model();
		$model_u	= new User_model();
		
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		$data = array(
			'$title' => 'Edit Data Peminjaman' , 
			'peminjaman' => $model->getPeminjaman($id)->getRow(),
			'buku'		=> $model_b->getBuku(),
			'anggota'	=> $model_a->getAnggota(),
			'user'		=> $model_u->getUser()
		);
		

		return view('peminjaman/v_edit',$data);
	}

	public function update()
    {
        $model = new Peminjaman_model();
		$id = $this->request->getPost('id_pinjam');
		$data = [
			'kd_buku' => $this->request->getPost('kd_buku'),
			'nim' => $this->request->getPost('nim'),
			'id_user' => $this->request->getPost('id_user'),
			'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
			'tgl_kembali' => $this->request->getPost('tgl_kembali'),
		];
		$model->updateData($data, $id);
		return redirect()->to('/peminjaman');
    }

    public function kembali($id)
	{
		$model = new Peminjaman_model();
		
		// $data['artikel'] = $model->getArtikel($id)->getRow();
		// echo view('edit_artikel_view', $data);
		$data = array(
			'$title' => 'Data Pengembalian' , 
			'peminjaman' => $model->getPeminjaman($id),
		);

		return view('peminjaman/v_kembali',$data);
	}
 
    public function delete($id)
    {
        $model = new Peminjaman_model();
        $model->deleteData($id);
        return redirect()->to('/peminjaman');
    }
}