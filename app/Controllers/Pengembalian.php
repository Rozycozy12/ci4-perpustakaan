<?php namespace App\Controllers;

use App\Models\Pengembalian_model;
use App\Models\Peminjaman_model;
use CodeIgniter\Controllers;
class Pengembalian extends BaseController{


	public function index(){
		$model = new Pengembalian_model();
		$data  = [
				'title' 	 	 => 'Data Pengembalian Buku',
 				'isi'			 => 'pengembalian/v_data',
 				'pengembalian'   => $model->getPengembalian(),
 				
		];
		
		return view('layout/v_wrapper',$data);
	}

	public function laporan(){
		$model = new Pengembalian_model();
		$data  = [
				'title' 	 	 => 'Laporan Pengembalian Buku',
 				'isi'			 => 'pengembalian/v_laporan',
 				'pengembalian'   => $model->getPengembalian(),
 				
		];
		
		return view('layout/v_wrapper',$data);
	}

	public function add_new(){
		$Model   	= new Pengembalian_model();
		$model_p 	= new Peminjaman_model();
		$data = [
			'title'			=> 'Tambah Data Pengembalian',
			'peminjaman'    => $Model->getDataPinjam()
		];
		return view('pengembalian/v_kembali',$data);
	}

	public function save()
	{
		$model = new Pengembalian_model();
		$model_p = new Peminjaman_model();
		$id=$this->request->getPost('id_pinjam');
		$pinjam = array(
			'stts_buku' => 'Kembali'
		);
		$model_p->updateData($pinjam,$id);
		$data = [
			'id_pinjam'			=> $id,
			'tgl_serah'			=> date('Y-m-d'),
			'denda'				=> $this->request->getPost('denda')
		];
		// print_r($data);
		$model->savePengembalian($data);
		return redirect()->to('/pengembalian');
	}
	
    public function delete($id)
    {
        $model = new Pengembalian_model();
        $model->deleteData($id);
        return redirect()->to('/pengembalian');
        // date('Y-m-d')
    }
    public function denda(){
    	$model_p 	= new Peminjaman_model();
    	$id=$this->request->getPost('id_pinjam');
    	$data=[
    		'peminjaman'	=> $model_p->getPeminjaman($id)->getRow()
    	];
    	return view ('/pengembalian/v_denda', $data);
    }
}