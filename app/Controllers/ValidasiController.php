<?php

namespace App\Controllers;
use App\Models\Users;
use App\Models\Mahasiswa;


use App\Controllers\BaseController;

class ValidasiController extends BaseController
{
    protected $users;
 
    function __construct()
    {
        $this->users = new Users();
        $this->mahasiswa = new Mahasiswa();
    }
    public function index()
    {
        $users = $this->users
            ->join('mahasiswa', 'mahasiswa.email = users.email', 'inner')
            ->select('users.*,  mahasiswa.email, mahasiswa.angkatan, mahasiswa.nim')
            ->findAll();

        $data['users'] = $users;

        return view('validasi/index', $data);
    }

    public function edit($id)
    {  
        $this->users->update($id,[
            'active' => $this->request->getPost('active'),
        ]);

		return redirect('validasi')->with('success', 'User Berhasil Di Validasi');	
    }

}
