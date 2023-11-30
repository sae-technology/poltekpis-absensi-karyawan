@extends('template.master')

@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Data Karyawan</h4>
            </div>
            <form class="form" action="{{route('simpankaryawan')}}" method="POST" enctype="multipart/form-data" class="step-form-horizontal">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Id<span class="text-danger">*</span></label>
                        <input name="idkrywn" class="form-control form-control-md @error('idkrywn') is-invalid @enderror" type=" text" placeholder="Id" value="{{$IdKaryawan}}" readonly="readonly" disabled />
                        @error('idkrywn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input name="nmkrywn" class="form-control form-control-md @error('nmkrywn') is-invalid @enderror" type=" text" placeholder="Nama Lengkap" value="{{old('nmkrywn')}}" />
                        @error('nmkrywn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Divisi<span class="text-danger">*</span></label>
                        <div>
                            <select name="dvkrywn" class="form-control">
                                <option value="">== Pilih Divisi ==</option>
                                @foreach ($dataDivisi as $dv)
                                    <option value="{{ $dv->IIDDV }}">{{ $dv->VNMDV }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Jabatan
                    <div class="form-group">
                        <label for="name">Jabatan</label>
                        <div>
                            <select name="jbtnkrywn" class="form-control">
                                <option value="">== Pilih Jabatan ==</option>
                                @foreach ($AllDivisi as $dv)
                                    <option value="{{ $dv->IIDDV }}">{{ $dv->VNMDV }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    --}}
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-rounded wspace-no"><i class="las scale5 la-save mr-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection