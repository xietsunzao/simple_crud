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
                                    href="{{ route('product.add') }}">
                                    <i class="fa fa-plus"></i> Tambah {{ $title }}
                                </a>
                            </div>
                            <h3 class="card-title"><i class="fas fa-cubes"></i> List Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($product as $r)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $r->kode_produk }}</td>
                                            <td>{{ $r->nama_produk }}</td>
                                            <td>Rp. {{ number_format($r->harga_jual) }}</td>
                                            <td>Rp. {{ number_format($r->harga_beli) }}</td>
                                            <td>{{ $r->nama_unit }}</td>
                                            <td>{{ $r->nama_kategori }}</td>
                                            <td>
                                                <a href="{{ route('product.edit', $r->id_produk) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="{{ route('product.delete', $r->id_produk) }}"
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
