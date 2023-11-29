<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Divisi;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class DivisiController extends Controller
{
    public function index()
    {
        // $title = 'Delete Product!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);

        confirmDelete();

        $dataDivisi = Divisi::getAllDivisi();
        return view('master.divisi-list', compact('dataDivisi'));
    }

    public function tambahDivisi()
    {
        $KodeDivisi = Divisi::getKodeDivisi();
        return view('master.divisi-add', compact('KodeDivisi'));
    }

    public function simpanDivisi(Request $request)
    {
        $request->validate([
            'kddvs' => 'required',
            'nmdvs' => 'required',
        ]);

        $dataArray = ([
            'VKDDV'    => $request->kddvs,
            'VNMDV'    => $request->nmdvs,
            'DTINDV'   => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDINDV'   => 1,
            'VSTSDV'   => 1,
        ]);

        try {
            Divisi::create($dataArray);
            Alert::success('Informasi', 'Simpan data divisi berhasil');
            return redirect()->route('divisi');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }

    public function dataDivisiByKode($kode)
    {
        $dataDivisi = Divisi::getDivisiByKode($kode);
        return view('master.divisi-update', compact('dataDivisi'));
    }

    public function updateDivisi(Request $request)
    {
        $request->validate([
            'kddvs' => 'required',
            'nmdvs' => 'required',
        ]);

        $dataArray = ([
            'VKDDV'    => $request->kddvs,
            'VNMDV'    => $request->nmdvs,
            'DTMDFDV'   => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDMDFDV'   => 1,
            'VSTSDV'   => 1,
        ]);

        try {
            Divisi::where('VKDDV', $request->kddvs)->update($dataArray);
            Alert::success('Informasi', 'Update data divisi berhasil');
            return redirect()->route('divisi');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }

    public function hapusDivisi($kode)
    {
        $dataArray = ([
            'DTMDFDV'   => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDMDFDV'  => 1,
            'VSTSDV'   => 0,
        ]);

        try {
            Divisi::where('VKDDV', $kode)->update($dataArray);
            Alert::success('Informasi', 'Hapus data divisi berhasil');
            return redirect()->route('divisi');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }
}
