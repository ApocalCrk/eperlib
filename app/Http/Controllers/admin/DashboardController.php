<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Member;
use App\Models\TransaksiPeminjaman;

class DashboardController extends Controller
{
    public function index() {
        $buku = Buku::count();
        $member = Member::count();
        $peminjaman = TransaksiPeminjaman::where('status', 'pinjam')->count();
        $memberCheck = [];
        for ($i=0; $i < 7; $i++) { 
            $memberCheck[] = Member::whereDate('created_at', today()->subDays($i))->count();
        }
        $bukuCheck = [];
        for ($i=0; $i < 7; $i++) { 
            $bukuCheck[] = Buku::whereDate('created_at', today()->subDays($i))->count();
        }
        $peminjamanCheck = [];
        for ($i=0; $i < 7; $i++) { 
            $peminjamanCheck[] = TransaksiPeminjaman::whereDate('tanggal_pinjam', today()->subDays($i))->count();
        }
        try{
            if($peminjamanCheck[0] == 0 || $peminjamanCheck[6] == 0){
                $getPercentageofPeminjaman = 0.0;
            }else{
                $getPercentageofPeminjaman = ($peminjamanCheck[0] - $peminjamanCheck[6]) / $peminjamanCheck[6] * 100;
            }
        } catch(\Exception $e){
            $getPercentageofPeminjaman = 0.0;
        }
        $getPercentageofPeminjaman = $getPercentageofPeminjaman > 0 ? '+' . $getPercentageofPeminjaman : $getPercentageofPeminjaman;
        
        $peminjamanSevenDaysAgo = json_encode($peminjamanCheck);
        $bookIncrease = json_encode($bukuCheck);
        $memberSevenDaysAgo = json_encode($memberCheck);
        return view('admin.dashboard.index', compact('buku', 'member', 'memberSevenDaysAgo', 'bookIncrease', 'peminjaman', 'peminjamanSevenDaysAgo', 'getPercentageofPeminjaman'));
    }

    public function download_report() {
        $peminjaman = TransaksiPeminjaman::with('member', 'buku')->get();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setTitle('Laporan Peminjaman');
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nomor Pokok Mahasiswa');
        $sheet->setCellValue('C1', 'Nama Peminjam');
        $sheet->setCellValue('D1', 'Judul Buku');
        $sheet->setCellValue('E1', 'Tanggal Pinjam');
        $sheet->setCellValue('F1', 'Tanggal Kembali');
        $sheet->setCellValue('G1', 'Status');

        foreach ($peminjaman as $key => $value) {
            $sheet->setCellValue('A' . ($key+2), $key+1);
            $sheet->setCellValue('B' . ($key+2), $value->member->npm);
            $sheet->setCellValue('C' . ($key+2), $value->member->nama);
            $sheet->setCellValue('D' . ($key+2), $value->buku->judul);
            $sheet->setCellValue('E' . ($key+2), $value->tanggal_pinjam);
            $sheet->setCellValue('F' . ($key+2), $value->tanggal_kembali);
            $sheet->setCellValue('G' . ($key+2), $value->status);
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('storage/report/report.xlsx');
        return response()->download(public_path('storage/report/report.xlsx'));
    }
}
