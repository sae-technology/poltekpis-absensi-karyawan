<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class JabatanController extends Controller
{
    public function index()
    {
        // $title = 'Delete Product!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);

        confirmDelete();

        $dataJabatan = Jabatan::getAllJabatan();
        return view('master.Jabatan-list', compact('dataJabatan'));
    }

    public function tambahJabatan()
    {
        $KodeJabatan = Jabatan::getKodeJabatan();
        return view('master.Jabatan-add', compact('KodeJabatan'));
    }

    public function simpanJabatan(Request $request)
    {
        $request->validate([
            'kdjbtn' => 'required',
            'nmjbtn' => 'required',
        ], [
            'kdjbtn.required' => 'Terjadi kesalahan!',
            'nmjbtn.required' => 'Nama Jabatan harus diisi.'
        ]);

        $dataArray = ([
            'VKDJBTN'    => $request->kdjbtn,
            'VNMJBTN'    => $request->nmjbtn,
            'DTINJBTN'   => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDINJBTN'   => 1,
            'VSTSJBTN'   => 1,
        ]);

        try {
            Jabatan::create($dataArray);
            Alert::success('Informasi', 'Simpan data Jabatan berhasil');
            return redirect()->route('jabatan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }

    public function dataJabatanByKode($kode)
    {
        $dataJabatan = Jabatan::getJabatanByKode($kode);
        return view('master.Jabatan-update', compact('dataJabatan'));
    }

    public function updateJabatan(Request $request)
    {
        $request->validate([
            'kdjbtn' => 'required',
            'nmjbtn' => 'required',
        ]);

        $dataArray = ([
            'VKDJBTN'    => $request->kdjbtn,
            'VNMJBTN'    => $request->nmjbtn,
            'DTMDFJBTN'   => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDMDFJBTN'   => 1,
            'VSTSJBTN'   => 1,
        ]);

        try {
            Jabatan::where('VKDJBTN', $request->kdjbtn)->update($dataArray);
            Alert::success('Informasi', 'Update data Jabatan berhasil');
            return redirect()->route('jabatan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }

    public function hapusJabatan($kode)
    {
        $dataArray = ([
            'DTMDFJBTN'   => Carbon::now()->format('Y-m-d H:i:s'),
            'IIDMDFJBTN'  => 1,
            'VSTSJBTN'   => 0,
        ]);

        try {
            Jabatan::where('VKDJBTN', $kode)->update($dataArray);
            Alert::success('Informasi', 'Hapus data Jabatan berhasil');
            return redirect()->route('jabatan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', $th->getMessage());
            return back();
        }
    }
}
