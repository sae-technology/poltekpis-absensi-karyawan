<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'tblkrywn';
    protected $primaryKey = 'IDKRYWN';
    protected $fillable = [
        'IDKRYWN',
        'VNIP',
        'VNIK',
        'VNMKRYWN',
        'VTMPTLHR',
        'DTGLLHR',
        'VAGMA',
        'TXALMT',
        'IIDJBTN',
        'IIDDV',
        'DTINKRYWN',
        'IIDINKRYWN',
        'DTMDFKRYWN',
        'IIDMDFKRYWN',
        'VSTSKRYWN',
    ];
    public $timestamps = false;
    public $incrementing = false;

    public static function getAllKaryawan()
    {
        $hasil = Karyawan::where('VSTSKRYWN', '=', 1)-> orderBy('IDKRYWN', 'ASC')->get();
        return $hasil;
    }
    public static function getIdKaryawan()
    {
        $lastID = Karyawan::max("IDKRYWN");
        return $lastID + 1;
    }
    public static function getKaryawanById($id)
    {
        $hasil = Karyawan::where('IDKRYWN', '=', $id)->get();
        return $hasil;
    }
}
