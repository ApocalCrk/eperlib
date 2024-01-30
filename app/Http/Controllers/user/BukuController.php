<?php

namespace App\Http\Controllers\user;

use App\Models\Buku;
use App\Models\Bookmark;
use App\Models\LikeBook;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $listBuku = Buku::all();
        foreach ($listBuku as $item) {
            $item->tentang = $this->generateRandomText($item->tentang);
        }
        return view('user.book.index', compact('listBuku'));
    }

    public function detail($id) {
        $buku = Buku::find($id);
        if(!$buku){
            return redirect()->back()->with('error', 'Buku tidak ditemukan!');
        }
        $buku->kategori = explode(',', $buku->kategori);
        $getBookmarkCount = Bookmark::where('isbn', $id)->count();
        $getLikeBookCount = LikeBook::where('isbn', $id)->count();
        $checkBookmark = Bookmark::where('npm', Auth::user()->npm)->where('isbn', $id)->first();
        $checkLikeBook = LikeBook::where('npm', Auth::user()->npm)->where('isbn', $id)->first();
        $recommendBook = Buku::orderBy('isbn', 'desc')->get();
        $recommendBook = $recommendBook->sortByDesc(function($recommendBook){
            return $recommendBook->likeBook->count() + $recommendBook->bookmark->count();
        });
        $recommendBook = $recommendBook->take(3);
        return view('user.book.detail', compact('buku', 'getBookmarkCount', 'getLikeBookCount', 'checkBookmark', 'checkLikeBook', 'recommendBook'));
    }

    public static function generateRandomText($text, $maxLength = 200) {
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
        return $generatedText == '' ? BukuController::generateRandomText($text) : $generatedText;
    }
}
