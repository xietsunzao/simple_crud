@extends('template.backend.template')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('sale.addaction') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="konsumen">Nama Konsumen</label>
                                    <input type="text" name="konsumen" class="form-control" id="konsumen"
                                        placeholder="Enter Product Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="product">Produk</label>
                                    <select name="product" id="product" class="form-control">
                                        @foreach ($product as $r)
                                            <option value="{{ $r->id_produk }}">{{ $r->kode_produk }} -
                                                {{ $r->nama_produk }} - Rp. {{ number_format($r->harga_jual) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Pembelian</label>
                                    <input type="text" name="jumlah" class="form-control" id="jumlah"
                                        placeholder="Jumlah" required>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ route('sale') }}" class="btn btn-default"><i class="fas fa-sign-out-alt"></i>
                                    Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
