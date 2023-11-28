@extends('template.master')

@section('content')
<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
    <div class="ml-auto d-inline-flex mr-3">
        <a href="{{route('tambahdivisi')}}" class="btn btn-primary btn-md btn-rounded wspace-no"><i class="las scale5 la-plus mr-2"></i>Tambah Data</a>
    </div>
    <!-- <a href="javascript:void(0);" class="settings-icon"><i class="flaticon-381-settings-2 mr-0"></i></a> -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Divisi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection