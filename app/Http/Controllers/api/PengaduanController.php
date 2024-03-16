<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Helpers\APIFormatter;

class PengaduanController extends Controller
{
    public function create(Request $request) {
        try {
            $request->validate([
                'nik' => 'required',
                'nama' => 'required',
                'aduan' => 'required',
            ]);

            $pengaduan = Pengaduan::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'aduan' => $request->aduan,
                'tanggal' => date('Y-m-d H:i:s'),
                'status' => "Belum Ditinjau",
            ]);

            if($pengaduan) {
                return APIFormatter::createAPI(200, "Success", $pengaduan);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Throwable $th) {
            return APIFormatter::createAPI(500, 'Failed', $th);
        }
    }
}