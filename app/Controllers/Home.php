<?php

namespace App\Controllers;
use App\Models\TugasAkhir;
use App\Models\Users;
use App\Models\Mahasiswa;

class Home extends BaseController
{
    public function index()
    {
        
        return view('welcome_message');
    }
    public function dashboard()
    {
        $tugasAkhirModel = new TugasAkhir();
        $usersModel = new Users();
        $mahasiswaModel = new Mahasiswa();

        $jumlahTugasAkhir = $tugasAkhirModel->countAll();
        $jumlahUsers = $usersModel->countAll();
        $jumlahMahasiswa = $mahasiswaModel->countAll();

        // Menyampaikan data ke view
        $data = [
            'jumlahTugasAkhir' => $jumlahTugasAkhir,
            'jumlahUsers' => $jumlahUsers,
            'jumlahMahasiswa' => $jumlahMahasiswa
        ];
        return view('dashboard',$data);
    }
}

