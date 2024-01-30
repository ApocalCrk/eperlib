<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LikeBook;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;

class LikeBookController extends Controller
{
    public function index() {
        $likeBook = LikeBook::where('npm', Auth::user()->npm)->get();
        foreach ($likeBook as $item) {
            $item->buku->cover = asset('storage/'.$item->buku->cover);
            $item->buku->tentang = BukuController::generateRandomText($item->buku->tentang);
        }
        return view('user.like.index', compact('likeBook'));
    }

    public function addLikeBook($id){
        $likeBookCheck = LikeBook::where('npm', Auth::user()->npm)->where('isbn', $id)->first();
        if(!$likeBookCheck){
            LikeBook::create([
                'isbn' => $id,
                'npm' => Auth::user()->npm
            ]);
            return redirect()->back()->with('success', 'Buku berhasil disukai!');
        }else{
            LikeBook::where('npm', Auth::user()->npm)->where('isbn', $id)->delete();
            return redirect()->back()->with('success', 'Berhasil membatalkan buku yang disukai!');
        }
    }
}
