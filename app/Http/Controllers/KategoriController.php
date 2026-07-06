<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    private function getKategori()
    {
        return [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku database dan SQL',
                'jumlah_buku' => 18
            ],
            [
                'id' => 3,
                'nama' => 'Networking',
                'deskripsi' => 'Buku jaringan komputer',
                'jumlah_buku' => 15
            ],
            [
                'id' => 4,
                'nama' => 'Artificial Intelligence',
                'deskripsi' => 'Machine Learning dan AI',
                'jumlah_buku' => 12
            ],
            [
                'id' => 5,
                'nama' => 'Web Development',
                'deskripsi' => 'HTML, CSS, JavaScript dan Laravel',
                'jumlah_buku' => 30
            ]
        ];
    }

    public function index()
    {
        $kategori_list = $this->getKategori();

        return view('kategori.index', compact('kategori_list'));
    }

    public function show($id)
    {
        $kategori = collect($this->getKategori())->firstWhere('id', $id);

        if (!$kategori) {
            abort(404);
        }

        $buku_list = [
            [
                'judul' => 'Laravel 13',
                'pengarang' => 'Taylor Otwell'
            ],
            [
                'judul' => 'PHP Modern',
                'pengarang' => 'Budi Raharjo'
            ],
            [
                'judul' => 'Clean Code',
                'pengarang' => 'Robert C. Martin'
            ]
        ];

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    public function search($keyword)
    {
        $kategori_list = collect($this->getKategori())->filter(function ($item) use ($keyword) {
            return str_contains(
                strtolower($item['nama']),
                strtolower($keyword)
            );
        });

        return view('kategori.search', compact('kategori_list', 'keyword'));
    }
}
