<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Notification;
use App\Models\TransaksiPeminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    public function index() {
        $count_pinjaman = TransaksiPeminjaman::where('npm', Auth::user()->npm)->where('status', 'pinjam')->count();
        $count_bookmark = Bookmark::where('npm', Auth::user()->npm)->count();
        $count_disukai = Bookmark::where('npm', Auth::user()->npm)->count();
        $count_dikembalikan = TransaksiPeminjaman::where('npm', Auth::user()->npm)->where('tanggal_kembali', '>' , date('Y-m-d'))->where('status', '!=', 'kembali')->count();
        return view('user.dashboard.index', compact('count_pinjaman', 'count_bookmark', 'count_disukai', 'count_dikembalikan'));
    }
    
    public function profil() {
        $count_bookmark = Bookmark::where('npm', Auth::user()->npm)->count();
        $count_disukai = Bookmark::where('npm', Auth::user()->npm)->count();
        return view('user.profil.index', compact('count_bookmark', 'count_disukai'));
    }

    public function updateNotifikasi($id){
        $notifikasi = Notification::find($id);
        $notifikasi->status = 'sudah dibaca';
        $notifikasi->save();
        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function updateAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $avatarName = Auth::user()->npm.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatar', $avatarName, 'public');
        $user = Member::find(Auth::user()->npm);
        if($user->avatar != 'avatar/avatar.png') Storage::disk('public')->delete($user->avatar);
        $user->avatar = 'avatar/'.$avatarName;
        $user->save();
        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function search(){
        $buku = Buku::all();
        $page = [
            [
                'name' => 'Halaman Utama',
                'url' => '/user/dashboard',
                'icon' => 'home',
                'type' => 'pages'
            ],
            [
                'name' => 'Profil',
                'url' => '/user/profil',
                'icon' => 'user',
                'type' => 'pages'
            ],
            [
                'name' => 'Buku',
                'url' => '/user/book',
                'icon' => 'book',
                'type' => 'pages'
            ],
            [
                'name' => 'Peminjaman',
                'url' => '/user/peminjaman_buku',
                'icon' => 'book',
                'type' => 'pages'
            ],
            [
                'name' => 'Pengembalian',
                'url' => '/user/pengembalian_buku',
                'icon' => 'book',
                'type' => 'pages'
            ],
            [
                'name' => 'Bookmark',
                'url' => '/user/bookmark',
                'icon' => 'bookmark',
                'type' => 'pages'
            ],
            [
                'name' => 'Disukai',
                'url' => '/user/like',
                'icon' => 'heart',
                'type' => 'pages'
            ]
        ];
        $data = [];
        foreach($buku as $b){
            $data[] = [
                'name' => $b->judul,
                'url' => '/user/book/'.$b->isbn,
                'img' => 'storage/'.$b->cover,
                'author' => $b->penulis,
                'type' => 'books'
            ];
        }
        $data = array_merge($page, $data);
        return response()->json(['listItems' => $data]);
    }
}
