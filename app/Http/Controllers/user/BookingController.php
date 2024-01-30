<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class BookingController extends Controller
{
    public function index() {
        $ruangan = Ruangan::all();
        return view('user.booking.index', compact('ruangan'));
    }

    public function getDataBooking(){
        $booking = Booking::orderBy("created_at", "desc")->get();
        foreach($booking as $item){
            $item->responsive_id = null;
            $item->nama_ruangan = $item->ruangan->nama_ruangan;
            $item->nama_peminjam = $item->member->nama;
        }
        $booking = ["data" => $booking];
        return $booking;
    }

    public function checkRuangan($kode_ruangan, $date){
        $waktu = ["07:00 - 09:30", "09:30 - 11:00", "11:00 - 12:30", "12:30 - 14:00", "14:00 - 15:30", "15:30 - 17:00", "17:00 - 18:30"];
        $getTanggal = Booking::where("tanggal", $date)
                            ->where("kode_ruangan", $kode_ruangan)
                            ->get();

        $temp = [];
        foreach($getTanggal as $item){
            $temp[] = $item->waktu;
        }

        $waktu = array_values(array_filter($waktu, function($slot) use ($temp) {
            return !in_array($slot, $temp);
        }));

        return json_encode($waktu);
    }

    public function bookingRuangan(Request $request){
        $request->validate([
            "kode_ruangan" => "required",
            "npm" => "required",
            "tanggal" => "required",
            "waktu" => "required"
        ]);

        if($request->waktu == "Silahkan pilih Tanggal Peminjaman"){
            return "Silahkan pilih Tanggal Peminjaman";
        }

        Booking::create([
            "kode_ruangan" => $request->kode_ruangan,
            "npm" => $request->npm,
            "tanggal" => $request->tanggal,
            "waktu" => $request->waktu
        ]);
        
        return "success";
    }
}
