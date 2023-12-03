<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Karyawan;
use App\Models\Divisi;
use App\Models\Jabatan;

class KaryawanController extends Controller
{
    public function index()
    {
        // $title = 'Delete Product!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);

        confirmDelete();

        $dataKaryawan = Karyawan::getAllKaryawan();
        $dataDivisi = Divisi::getAllDivisi();
        $dataJabatan = Jabatan::getAllJabatan();
        return view('master.karyawan-list', compact('dataKaryawan', 'dataDivisi', 'dataJabatan'));
    }

    public function tambahKaryawan()
    {
        $IdKaryawan = Karyawan::getIdKaryawan();
        $dataDivisi = Divisi::getAllDivisi();
        $dataJabatan = Jabatan::getAllJabatan();
        return view('master.karyawan-add', compact('IdKaryawan', 'dataDivisi', 'dataJabatan'));
    }

    public function simpanKaryawan(Request $request)
    {
        $request->validate([
            'idkrywn' => 'required',
            'nmkrywn' => 'required',
        ], [
            'idkrywn.required' => 'Terjadi kesalahan!',
            'nmkrywn.required' => 'Nama karyawan harus diisi.'
        ]);

        $dataArray = ([
            'VNMKRYWN' => $request->nmkrywn,
            'IIDJBTN' => $request->jbtnkrywn,
            'IIDDV' => $request->dvkrywn,
            'DTINKRYWN' => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDINKRYWN' => 1,
            'VSTSKRYWN' => 1,
        ]);

        try {
            Karyawan::create($dataArray);
            Alert::success('Informasi', 'Simpan data karyawan berhasil');
            return redirect()->route('karyawan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }

    public function dataKaryawanById($id)
    {
        $dataKaryawan = Karyawan::getKaryawanById($id)[0];
        $dataDivisi = Divisi::getAllDivisi();
        $dataJabatan = Jabatan::getAllJabatan();
        return view('master.karyawan-update', compact('dataKaryawan', 'dataDivisi', 'dataJabatan'));
    }

    public function updateKaryawan(Request $request)
    {
        $request->validate([
            'idkrywn' => 'required',
            'nmkrywn' => 'required',
        ]);

        $dataArray = ([
            'IDKRYWN' => $request->idkrywn,
            'VNMKRYWN' => $request->nmkrywn,
            'VNIP' => $request->nipkrywn,
            'VNIK' => $request->nikkrywn,
            'VTMPTLHR' => $request->tmptlhr,
            'DTGLLHR' => $request->tgllhr,
            'VAGMA' => $request->agma,
            'TXALMT' => $request->almt,
            'IIDJBTN' => $request->jbtnkrywn,
            'IIDDV' => $request->dvkrywn,
            'DTMDFKRYWN' => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDMDFKRYWN' => 1,
            'VSTSKRYWN' => 1,
        ]);

        try {
            Karyawan::where('IDKRYWN', $request->idkrywn)->update($dataArray);
            Alert::success('Informasi', 'Update data karyawan berhasil');
            return redirect()->route('karyawan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }

    public function hapusKaryawan($id)
    {
        $dataArray = ([
            'DTMDFKRYWN'   => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDMDFKRYWN'  => 1,
            'VSTSKRYWN'   => 0,
        ]);

        try {
            Karyawan::where('IDKRYWN', $id)->update($dataArray);
            Alert::success('Informasi', 'Hapus data karyawan berhasil');
            return redirect()->route('karyawan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }
}
