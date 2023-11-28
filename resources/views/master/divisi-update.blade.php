@extends('template.master')

@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Data Divisi</h4>
            </div>
            <form class="form" action="#" method="POST" enctype="multipart/form-data" class="step-form-horizontal">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode<span class="text-danger">*</span></label>
                        <input name="kddvs" class="form-control form-control-md @error('kddvs') is-invalid @enderror" type=" text" placeholder="Kode" value="" />
                        @error('kddvsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input name="nmdvs" class="form-control form-control-md @error('nmdvs') is-invalid @enderror" type=" text" placeholder="Nama" value="" />
                        @error('nmdvs')
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