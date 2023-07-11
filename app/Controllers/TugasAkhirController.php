<?php

namespace App\Controllers;
use App\Models\TugasAkhir;
use App\Models\Users;
use App\Controllers\BaseController;

class TugasAkhirController extends BaseController
{
    protected $tugasakhir;
 
    function __construct()
    {
        $this->tugasakhir = new TugasAkhir();
        $this->users = new Users();
    }

    public function index()
    {
                
	$data['tugasakhir'] = $this->tugasakhir->findAll();

        return view('tugas-akhir/index', $data);
    }

    public function create()
	{
		return view('tugas-akhir/upload');
	}

    public function save()
    {
        if (!$this->validate([
			'judul' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
            'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
            'nim' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
            'tahun' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'file' => [
                'rules' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'ext_in' => 'File Extension Harus Berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]            
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 
		$dataBerkas = $this->request->getFile('file');
		$fileName = $dataBerkas->getRandomName();
		$this->tugasakhir->insert([
			'judul' => $this->request->getPost('judul'),
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'tahun' => $this->request->getPost('tahun'),
            'file' => $fileName,
		]);
		$dataBerkas->move('uploads/berkas/', $fileName);

		return redirect('tugasakhir')->with('success', 'Data Added Successfully');	
    }

    public function download($id)
    {  
        $data['file'] = $this->tugasakhir->find($id);
        return view('tugas-akhir/download', $data);

    }

    public function downloadfile($id)
{
    $data['file'] = $this->tugasakhir->find($id);
    
    if (!empty($data['file'])) {
        $filepath = 'uploads/berkas/' . $data['file']['file']; // Ubah WRITE_YOUR_FILEPATH dengan path lengkap ke direktori file

        if (file_exists($filepath)) {
            return $this->response->download($filepath, null);
        } else {
            // File tidak ditemukan, tangani dengan logika yang sesuai
            echo 'File tidak ditemukan.';
        }
    } else {
        // Data tidak ditemukan, tangani dengan logika yang sesuai
        echo 'Data tidak ditemukan.';
    }
}


    public function edit($id)
    {  
        $this->mahasiswa->update($id,[
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'jurusan' => $this->request->getPost('jurusan'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'angkatan' => $this->request->getPost('angkatan'),
        ]);

		return redirect('mahasiswa')->with('success', 'Data Edit Successfully');	
    }

    public function delete($id)
    {
        $this->mahasiswa->delete($id);

        return redirect('mahasiswa')->with('success', 'Data Deleted Successfully');
    }

}
