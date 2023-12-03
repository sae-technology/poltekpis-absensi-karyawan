@extends('template.master')

@section('content')
<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
    <div class="ml-auto d-inline-flex mr-3">
        <a href="{{route('tambahkaryawan')}}" class="btn btn-primary btn-md btn-rounded wspace-no"><i class="las scale5 la-plus mr-2"></i>Tambah Data</a>
    </div>
    <!-- <a href="javascript:void(0);" class="settings-icon"><i class="flaticon-381-settings-2 mr-0"></i></a> -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Divisi</th>
                                <th>NIP</th>
                                <th>NIK</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataKaryawan as $no => $x)
                            <tr>
                                <td>{{ $x->IDKRYWN  }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('karyawanbyid',$x->IDKRYWN)}}" class="btn btn-info shadow btn-sm sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('hapuskaryawan', $x->IDKRYWN) }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger shadow btn-sm sharp confirm"><i class=" fa fa-trash"></i></button>
                                        </form>
                                        <!-- <a href="{{route('hapuskaryawan',$x->IDKRYWN)}}" class="btn btn-danger shadow btn-sm sharp confirm"><i class=" fa fa-trash"></i></a> -->
                                    </div>
                                </td>
                                <td>{{ $x->VNMKRYWN }}</td>
                                @php
                                    $divisi = $dataDivisi->where('IIDDV', $x->IIDDV)->first();
                                    $jabatan = $dataJabatan->where('IIDJBTN', $x->IIDJBTN)->first();
                                @endphp
                                <td>{{ $jabatan->VNMJBTN ?? $x->IIDJBTN }}</td>
                                <td>{{ $divisi->VNMDV ?? $x->IIDDV }}</td>
                                <td>{{ $x->VNIP }}</td>
                                <td>{{ $x->VNIK }}</td>
                                <td>{{ $x->VTMPTLHR }}</td>
                                <td>{{ $x->DTGLLHR }}</td>
                                <td>{{ $x->VAGMA }}</td>
                                <td>{{ $x->TXALMT }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection