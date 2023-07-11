<?php

namespace App\Controllers;
use App\Models\Mahasiswa;
use App\Models\Users;


use App\Controllers\BaseController;

class MahasiswaController extends BaseController
{
    protected $mahasiswa;
 
    function __construct()
    {
        $this->mahasiswa = new Mahasiswa();
        $this->users = new Users();
    }

    public function index()
    {
                
	$data['mahasiswa'] = $this->mahasiswa->findAll();

        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        $this->mahasiswa->insert([
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'jurusan' => $this->request->getPost('jurusan'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'angkatan' => $this->request->getPost('angkatan'),
        ]);

		return redirect('mahasiswa')->with('success', 'Data Added Successfully');	
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
