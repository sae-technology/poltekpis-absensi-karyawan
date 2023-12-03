@extends('template.master')

@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-footer">
                <a type="button" href="{{route('karyawan')}}" class="btn btn-info btn-sm btn-rounded wspace-no"><i class="las scale5 la-angle-left mr-2"></i>Kembali</a>
            </div>
            <div class="card-header">
                <h4 class="card-title">Update Data Karyawan</h4>
            </div>
            <form id="form" class="form" action="{{route('editkaryawan')}}" method="POST" enctype="multipart/form-data" class="step-form-horizontal">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Id<span class="text-danger">*</span></label>
                        <input name="idkrywn" class="form-control form-control-md @error('idkrywn') is-invalid @enderror" type="text" placeholder="Id" value='{{empty($dataKaryawan->IDKRYWN) ? "" : $dataKaryawan->IDKRYWN}}' readonly="readonly"/>
                        @error('idkrywn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input name="nmkrywn" class="form-control form-control-md @error('nmkrywn') is-invalid @enderror" type="text" placeholder="Nama Lengkap" value='{{empty($dataKaryawan->VNMKRYWN) ? "" : $dataKaryawan->VNMKRYWN}}' />
                        @error('nmkrywn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Jabatan
                    <div class="form-group">
                        <label>Divisi<span class="text-danger">*</span></label>
                        <div>
                            <select name="dvkrywn" class="form-control">
                                <option value='{{empty($dataKaryawan->IIDDV) ? "" : $dataKaryawan->IIDDV}}'>== Pilih Divisi ==</option>
                                @foreach ($dataDivisi as $dv)
                                    <option value="{{ $dv->IIDDV }}">{{ $dv->VNMDV }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    --}}
                    @php
                        $selectedIIDJBTN = empty($dataKaryawan->IIDJBTN) ? "" : $dataKaryawan->IIDJBTN;
                        $selectedIIDDV = empty($dataKaryawan->IIDDV) ? "" : $dataKaryawan->IIDDV;
                        $divisi = $dataDivisi->where('IIDDV', $selectedIIDDV)->first();
                        $jabatan = $dataJabatan->where('IIDJBTN', $selectedIIDJBTN)->first();
                    @endphp
                    <div class="form-group">
                        <label>Jabatan</label>
                        <div>
                            <select name="jbtnkrywn" class="form-control">
                                <option value='{{ $selectedIIDJBTN }}'>
                                    {{ $jabatan ? $jabatan->VNMJBTN : "== Pilih Jabatan ==" }}
                                </option>
                            
                                @foreach ($dataJabatan as $jbtn)
                                    @if (!$jabatan || $jbtn->IIDJBTN != $jabatan->IIDJBTN)
                                        <option value="{{ $jbtn->IIDJBTN }}">{{ $jbtn->VNMJBTN }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Divisi</label>
                        <div>
                            <select name="dvkrywn" class="form-control">
                                <option value='{{ $selectedIIDDV }}'>
                                    {{ $divisi ? $divisi->VNMDV : "== Pilih Divisi ==" }}
                                </option>
                            
                                @foreach ($dataDivisi as $dv)
                                    @if (!$divisi || $dv->IIDDV != $divisi->IIDDV)
                                        <option value="{{ $dv->IIDDV }}">{{ $dv->VNMDV }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nomor Induk Pegawai</label>
                        <input name="nipkrywn" class="form-control form-control-md @error('nipkrywn') is-invalid @enderror" type="text" placeholder="Nomor Induk Pegawai" value='{{empty($dataKaryawan->VNIP) ? "" : $dataKaryawan->VNIP}}' />
                        @error('nipkrywn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nomor Induk Kependudukan</label>
                        <input name="nikkrywn" class="form-control form-control-md @error('nikkrywn') is-invalid @enderror" type="text" placeholder="Nomor Induk Kependudukan" value='{{empty($dataKaryawan->VNIK) ? "" : $dataKaryawan->VNIK}}' />
                        @error('nikkrywn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input name="tmptlhr" class="form-control form-control-md @error('tmptlhr') is-invalid @enderror" type="text" placeholder="Tempat Lahir" value='{{empty($dataKaryawan->VTMPTLHR) ? "" : $dataKaryawan->VTMPTLHR}}' />
                        @error('tmptlhr')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input name="tgllhr" class="form-control form-control-md @error('tgllhr') is-invalid @enderror" type="date" placeholder="Tanggal Lahir" value='{{empty($dataKaryawan->DTGLLHR) ? "" : $dataKaryawan->DTGLLHR}}' />
                        @error('tgllhr')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agma" class="form-control">
                            @php
                                $agamaOptions = [
                                    'Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'
                                ];
                                $selectedAgama = $dataKaryawan->VAGMA ?? '';
                            @endphp
                            <option value='{{ $selectedAgama ?: "" }}'>
                                {{ $selectedAgama ?: "== Pilih Agama ==" }}
                            </option>
                            @foreach ($agamaOptions as $agm)
                                @if ($agm != $selectedAgama)
                                    <option value="{{ $agm }}">{{ $agm }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="almt" class="form-control form-control-md @error('almt') is-invalid @enderror" type="text" placeholder="Alamat" value='{{empty($dataKaryawan->TXALMT) ? "" : $dataKaryawan->TXALMT}}' />
                        @error('almt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-sm btn-rounded wspace-no"><i class="las scale5 la-edit mr-2"></i>Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection