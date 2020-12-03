@extends('template.backend.template')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a class="btn btn-success shadow-success waves-effect waves-light m-1"
                                    href="{{ route('sale.add') }}">
                                    <i class="fa fa-plus"></i> Tambah {{ $title }}
                                </a>
                            </div>
                            <h3 class="card-title"><i class="fas fa-cubes"></i> List Data Penjualan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Tanggal Faktur</th>
                                    <th>No Faktur</th>
                                    <th>Nama Konsumen</th>
                                    <th>Kode Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($sale as $r)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $r->tgl_faktur }}</td>
                                            <td>{{ $r->no_faktur }}</td>
                                            <td>{{ $r->nama_konsumen }}</td>
                                            <td>{{ $r->kode_produk }}</td>
                                            <td>{{ $r->jumlah }}</td>
                                            <td>{{ $r->harga_jual }}</td>
                                            <td>{{ $r->total }}</td>
                                            <td>
                                                <a href="{{ route('sale.edit', $r->id_penjualan) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="{{ route('sale.delete', $r->id_penjualan) }}"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
