@extends('template.master')

@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-footer">
                <a type="button" href="{{route('jabatan')}}" class="btn btn-info btn-sm btn-rounded wspace-no"><i class="las scale5 la-angle-left mr-2"></i>Kembali</a>
            </div>
            <div class="card-header">
                <h4 class="card-title">Input Data Jabatan</h4>
            </div>
            <form class="form" action="{{route('simpanjabatan')}}" method="POST" enctype="multipart/form-data" class="step-form-horizontal">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode<span class="text-danger">*</span></label>
                        <input name="kdjbtn" class="form-control form-control-md @error('kdjbtn') is-invalid @enderror" type=" text" placeholder="Kode" value="{{$KodeJabatan}}" readonly="readonly" />
                        @error('kdjbtn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input name="nmjbtn" class="form-control form-control-md @error('nmjbtn') is-invalid @enderror" type=" text" placeholder="Nama" value="{{old('nmjbtn')}}" />
                        @error('nmjbtn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-rounded wspace-no"><i class="las scale5 la-save mr-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection