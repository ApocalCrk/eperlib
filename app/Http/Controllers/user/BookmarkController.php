<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;

class BookmarkController extends Controller
{
    public function index() {
        $bookmark = Bookmark::where('npm', Auth::user()->npm)->get();
        foreach ($bookmark as $item) {
            $item->buku->cover = asset('storage/'.$item->buku->cover);
            $item->buku->tentang = BukuController::generateRandomText($item->buku->tentang);
        }
        return view('user.bookmark.index', compact('bookmark'));
    }

    public function addBookmark($id){
        $bookmarkCheck = Bookmark::where('npm', Auth::user()->npm)->where('isbn', $id)->first();
        if(!$bookmarkCheck){
            Bookmark::create([
                'isbn' => $id,
                'npm' => Auth::user()->npm
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan buku ke bookmark!');
        }else{
            Bookmark::where('npm', Auth::user()->npm)->where('isbn', $id)->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus buku dari bookmark!');
        }
    }
}
