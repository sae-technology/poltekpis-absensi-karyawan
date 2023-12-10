<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'tbljbtn';
    protected $primaryKey = 'IIDJBTN';
    protected $fillable = [
        'IIDJBTN',
        'VKDJBTN',
        'VNMJBTN',
        'DTINJBTN',
        'IIDINJBTN',
        'DTMDFJBTN',
        'IIDMDFJBTN',
        'VSTSJBTN'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public static function getKodeJabatan()
    {
        $maxID = Jabatan::max("IIDJBTN");
        $inisial = "JBTN-";
        $Kode = $inisial . sprintf("%02s", $maxID + 1);
        return $Kode;
    }

    public  static function getAllJabatan()
    {
        $hasil = Jabatan::where('VSTSJBTN', '=', 1)->orderBy('IIDJBTN', 'ASC')->get();
        return $hasil;
    }

    public static function getJabatanByKode($kode)
    {
        $hasil = Jabatan::where('VKDJBTN', '=', $kode)->first();
        return $hasil;
    }
}
