<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'tbldv';
    protected $primaryKey = 'IIDDV';
    protected $fillable = [
        'IIDDV',
        'VKDDV',
        'VNMDV',
        'DTINDV',
        'IIDINDV',
        'DTMDFDV',
        'IIDMDFDV',
        'VSTSDV'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public static function getKodeDivisi()
    {
        $maxID = Divisi::max("IIDDV");
        $inisial = "DIV-";
        $Kode = $inisial . sprintf("%02s", $maxID + 1);
        return $Kode;
    }

    public  static function getAllDivisi()
    {
        $hasil = Divisi::where('VSTSDV', '=', 1)->orderBy('IIDDV', 'ASC')->get();
        return $hasil;
    }

    public static function getDivisiByKode($kode)
    {
        $hasil = Divisi::where('VKDDV', '=', $kode)->first();
        return $hasil;
    }
}
