<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComicsModel;
use Exception;

class Comics extends BaseController
{
    protected $comicModel;
    public function __construct()
    {
        $this->comicModel = new ComicsModel();
    }

    public function index()
    {


        $data = [
            'tittle' => 'Daftar Komik',
            'comic' => $this->comicModel->getComic()
        ];


        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'tittle' => 'Detail Kommik',
            'comic' => $this->comicModel->getComic($slug),
        ];

        // cek jika slug kosong
        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan');
        };

        return view('komik/detail', $data);
    }

    public function create()
    {

        $data = [
            'tittle' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save()
    {

        //validation
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[comics.judul]',
                'errors' => [
                    'required' => '{field} Komik harus diisi!',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Komik harus diisi!',

                ]
            ],
            'penerbit' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => '{field} Komik harus diisi!',

                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->comicModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbi' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('Pesan', 'Data Berhasil ditambahkan');

        return redirect()->to('/comics');
    }
}
