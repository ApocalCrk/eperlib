<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\LikeBook;
use App\Models\TransaksiPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimMasukan;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $favoriteBook = LikeBook::select('isbn')->groupBy('isbn')->orderByRaw('COUNT(*) DESC')->first();
        if(!$favoriteBook) {
            $favoriteBook = Buku::inRandomOrder()->first();
            $favoriteBook->tentang = $this->generateRandomText($favoriteBook->tentang);
            $favoriteBook->cover = asset('storage/'.$favoriteBook->cover);
        }else {
            $favoriteBook->buku->tentang = $this->generateRandomText($favoriteBook->buku->tentang);
            $favoriteBook->buku->cover = asset('storage/'.$favoriteBook->buku->cover);
        }
        
        $recommendBook = Buku::inRandomOrder()->first();
        $recommendBook->tentang = $this->generateRandomText($recommendBook->tentang, 400);
        $recommendBook->cover = asset('storage/'.$recommendBook->cover);

        $mostPinjam = TransaksiPeminjaman::select('isbn')->groupBy('isbn')->orderByRaw('COUNT(*) DESC')->limit(3)->get();
        foreach($mostPinjam as $book) {
            $book->buku->tentang = $this->generateRandomText($book->buku->tentang, 800);
            $book->buku->cover = asset('storage/'.$book->buku->cover);
        }
        
        return view('welcome', compact('favoriteBook', 'recommendBook', 'mostPinjam'));
    }

    function generateRandomText($text, $maxLength = 300) {
        $cleanedText = strip_tags($text);
        preg_match_all('/[A-Z][^\.!?]*[\.!?]/', $cleanedText, $sentences);
        $validSentences = array_filter($sentences[0], function ($sentence) {
            return ctype_upper($sentence[0]) && substr($sentence, -1) === '.';
        });
        shuffle($validSentences);
        $generatedText = '';
        foreach ($validSentences as $sentence) {
            if (strlen($generatedText) + strlen($sentence) <= $maxLength) {
                $generatedText .= ' ' . $sentence;
            } else {
                break;
            }
        }

        

        if($maxLength == 400) {
            if(strlen($generatedText) < 350) return $this->generateRandomText($text, 400);
        }else{
            if(strlen($generatedText) < 250) return $this->generateRandomText($text);
        }

        return $generatedText == '' ? $this->generateRandomText($text) : $generatedText;
    }

    public function kirim_masukan(Request $request) {
        $validation = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required'
        ]);

        if($validation->fails()) {
            return response()->json(['message' => $validation->errors()->first()], 422);
        }

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan
        ];

        Mail::to('elctperlib@gmail.com', 'Perpustakaan')->send(new KirimMasukan($data));

        return response()->json(['message' => 'Pesan berhasil dikirim']);
    }
}
