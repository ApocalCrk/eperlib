<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class BukuController extends Controller
{   
    public $validator_check = [
        'judul.required' => 'Judul buku tidak boleh kosong!',
        'penulis.required' => 'Penulis buku tidak boleh kosong!',
        'penerbit.required' => 'Penerbit buku tidak boleh kosong!',
        'tahun_terbit.required' => 'Tahun terbit buku tidak boleh kosong!',
        'isbn.required' => 'ISBN buku tidak boleh kosong!',
        'isbn.unique' => 'ISBN buku sudah terdaftar!',
        'isbn.numeric' => 'ISBN buku harus berupa angka!',
        'jumlah_buku.numeric' => 'Jumlah buku harus berupa angka!',
        'jumlah_buku.required' => 'Jumlah buku tidak boleh kosong!',
        'kategori.required' => 'Kategori buku tidak boleh kosong!',
        'tentang.required' => 'Tentang buku tidak boleh kosong!',
        'tentang.min' => 'Tentang buku minimal 400 karakter!',
        'cover.required' => 'Cover buku tidak boleh kosong!',
        'cover.image' => 'Cover buku harus berupa gambar!',
        'cover.mimes' => 'Cover buku harus berupa gambar dengan format jpg, jpeg, atau png!',
        'cover.max' => 'Ukuran cover buku maksimal 2MB!',
        'rak.required' => 'Rak buku tidak boleh kosong!'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.book.index');
    }

    public function getDataBuku()
    {
        $buku = Buku::all();
        foreach ($buku as $item) {
            $item->responsive_id = null;
            $item->cover = '<img src="' . asset('storage/'.$item->cover) . '" alt="Cover Buku" width="100px">';
        }
        $buku = ["data" => $buku];
        return $buku;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.addBook');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'judul' => ['required', 'string'],
                'penulis' => ['required', 'string'],
                'penerbit' => ['required', 'string'],
                'tahun_terbit' => ['required', 'string'],
                'isbn' => ['required', 'numeric', 'unique:buku,isbn'],
                'jumlah_buku' => ['required', 'numeric'],
                'kategori' => ['required', 'array'],
                'tentang' => ['required', 'string', 'min:400'],
                'cover' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'rak' => ['required', 'string'],
            ],
            $this->validator_check
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }
        
        $data['kategori'] = implode(',', $request->kategori);
        $data['cover'] = $request->file('cover')->store('book', 'public');
        Buku::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil ditambahkan!'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $isbn)
    {
        // not available
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $isbn)
    {
        $buku = Buku::find($isbn);
        return view('admin.book.editBook', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $isbn)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'judul' => ['required', 'string'],
                'penulis' => ['required', 'string'],
                'penerbit' => ['required', 'string'],
                'tahun_terbit' => ['required', 'string'],
                'isbn' => ['required', 'numeric'],
                'jumlah_buku' => ['required', 'numeric'],
                'kategori' => ['required', 'array'],
                'tentang' => ['required', 'string', 'min:400'],
                'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'rak' => ['required', 'string'],
            ],
            $this->validator_check
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        $data['kategori'] = implode(',', $request->kategori);
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('book', 'public');
        }
        Buku::find($isbn)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil diubah!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $isbn)
    {   
        try{
           $buku = Buku::find($isbn);
            Storage::disk('public')->delete($buku->cover);
            $buku->delete();
            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil dihapus!'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Buku gagal dihapus!'
            ], 400);
        }
    }
}