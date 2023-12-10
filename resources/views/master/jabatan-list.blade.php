@extends('template.master')

@section('content')
<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
    <div class="ml-auto d-inline-flex mr-3">
        <a href="{{route('tambahjabatan')}}" class="btn btn-primary btn-md btn-rounded wspace-no"><i class="las scale5 la-plus mr-2"></i>Tambah Data</a>
    </div>
    <!-- <a href="javascript:void(0);" class="settings-icon"><i class="flaticon-381-settings-2 mr-0"></i></a> -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Jabatan</h4>
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
                            @foreach($dataJabatan as $no => $x)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $x->VKDJBTN  }}</td>
                                <td>{{ $x->VNMJBTN }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('jabatanbykode',$x->VKDJBTN)}}" class="btn btn-info shadow btn-sm sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('hapusjabatan', $x->VKDJBTN) }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger shadow btn-sm sharp confirm"><i class=" fa fa-trash"></i></button>
                                        </form>
                                        <!-- <a href="{{route('hapusjabatan',$x->VKDJBTN)}}" class="btn btn-danger shadow btn-sm sharp confirm"><i class=" fa fa-trash"></i></a> -->
                                    </div>
                                </td>
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