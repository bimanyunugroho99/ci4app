<?php

namespace App\Controllers;

use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'jadwal' => $this->jadwalModel->getJadwal()
        ];
        return view('jadwal/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Jadwal',
            'jadwal' => $this->jadwalModel->getJadwal($slug)
        ];

        if (empty($data['jadwal'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jadwal kuliah' . $slug . 'Tidak ada!');
        }

        return view('/jadwal/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('jadwal/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'kode_kelas' => [
                'rules' => 'required|is_unique[jadwal.kode_kelas]',
                'errors' => [
                    'required' => '{field} - Jadwal harus diisi',
                    'is_unique' => '{field} - Jadwal sudah ada'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,5000]|is_image[gambar]|mime_in[gambar,jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/jadwal/create')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
        }


        $slug = url_title($this->request->getVar('kode_kelas'), '-', true);
        $this->jadwalModel->save([
            'kode_kelas' => $this->request->getVar('kode_kelas'),
            'slug' => $slug,
            'progdi' => $this->request->getVar('progdi'),
            'matkul' => $this->request->getVar('matkul'),
            'jadwal' => $this->request->getVar('jadwal'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan!');
        return redirect()->to('/jadwal');
    }

    public function delete($id)
    {
        $jadwal = $this->jadwalModel->find($id);
        if ($jadwal['gambar'] != 'default.jpg') {
            unlink('img/' . $jadwal['gambar']);
        }
        $this->jadwalModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/jadwal');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data',
            'validation' => \Config\Services::validation(),
            'jadwal' => $this->jadwalModel->getJadwal($slug)
        ];
        return view('jadwal/edit', $data);
    }

    public function update($id)
    {
        $jadwalLama = $this->jadwalModel->getJadwal($this->request->getVar('slug'));
        if ($jadwalLama['kode_kelas'] == $this->request->getVar('kode_kelas')) {
            $rule_kodekelas = 'required';
        } else {
            $rule_kodekelas = 'required|is_unique[jadwal.kode_kelas]';
        }

        if (!$this->validate([
            'kode_kelas' => [
                'rules' => $rule_kodekelas,
                'errors' => [
                    'required' => '{field} - Jadwal harus diisi',
                    'is_unique' => '{field} - Jadwal sudah ada'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,5000]|is_image[gambar]|mime_in[gambar,jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/jadwal/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $slug = url_title($this->request->getVar('kode_kelas'), '-', true);
        $this->jadwalModel->save([
            'id' => $id,
            'kode_kelas' => $this->request->getVar('kode_kelas'),
            'slug' => $slug,
            'progdi' => $this->request->getVar('progdi'),
            'matkul' => $this->request->getVar('matkul'),
            'jadwal' => $this->request->getVar('jadwal'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');
        return redirect()->to('/jadwal');
    }
    //--------------------------------------------------------------------

}
