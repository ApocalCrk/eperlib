<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    public function index() {
        return view('admin.ruangan.index');
    }

    public function getDataRuangan() {
        $ruangan = Ruangan::all();
        $data = [];
        foreach ($ruangan as $item) {
            $data[] = [
                'responsive_id' => null,
                'nama_ruangan' => $item->nama_ruangan,
                'kode_ruangan' => $item->kode_ruangan
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function tambahRuangan(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'kode_ruangan' => 'required|unique:ruangan',
                'nama_ruangan' => 'required',
            ],
            [
                'kode_ruangan.required' => 'Kode Ruangan tidak boleh kosong',
                'kode_ruangan.unique' => 'Kode Ruangan sudah ada',
                'nama_ruangan.required' => 'Nama Ruangan tidak boleh kosong'
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()], 400);
            }

            Ruangan::create([
                'kode_ruangan' => $request->kode_ruangan,
                'nama_ruangan' => $request->nama_ruangan
            ]);

            return response()->json(['message' => 'Ruangan berhasil ditambahkan'], 200);
        }catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function editRuangan(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'kode_ruangan_edit' => 'required|unique:ruangan,kode_ruangan,'.$request->kode_ruangan_edit.',kode_ruangan',
                'nama_ruangan_edit' => 'required',
            ],
            [
                'kode_ruangan_edit.required' => 'Kode Ruangan tidak boleh kosong',
                'kode_ruangan_edit.unique' => 'Kode Ruangan sudah ada',
                'nama_ruangan_edit.required' => 'Nama Ruangan tidak boleh kosong'
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()], 400);
            }

            Ruangan::where('kode_ruangan', $request->kode_ruangan_temp)->update([
                'kode_ruangan' => $request->kode_ruangan_edit,
                'nama_ruangan' => $request->nama_ruangan_edit
            ]);

            return response()->json(['message' => 'Ruangan berhasil diubah'], 200);
        }catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function deleteRuangan($kode_ruangan){
        try {
            $ruangan = Ruangan::find($kode_ruangan);
            if($ruangan){
                $ruangan->delete();
                return response()->json(['message' => 'Ruangan berhasil dihapus'], 200);
            }else{
                return response()->json(['message' => 'Ruangan tidak ditemukan'], 404);
            }
        }catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function bookingRuangan() {
        return view('admin.ruangan.booking');
    }

    public function getDataBooking() {
        $booking = Booking::orderBy('tanggal', 'asc')->get();
        $data = [];
        foreach ($booking as $item) {
            $data[] = [
                'responsive_id' => null,
                'kode_ruangan' => $item->kode_ruangan,
                'npm' => $item->npm,
                'nama_peminjam' => $item->member->nama,
                'tanggal' => $item->tanggal,
                'waktu' => $item->waktu
            ];
        }
        return response()->json(['data' => $data]);
    }
}
