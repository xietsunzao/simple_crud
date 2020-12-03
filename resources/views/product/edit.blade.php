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
                        <form role="form" action="{{ route('product.updateaction', $row->id_produk) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product">Nama Produk</label>
                                    <input type="text" name="product" class="form-control" value="{{ $row->nama_produk }}"
                                        id="product" placeholder="Enter Product Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($category as $r)
                                            <option value="{{ $r->id_kategori }}"
                                                {{ $r->id_kategori == $row->id_kategori ? 'selected' : '' }}>
                                                {{ $r->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="unit">Satuan</label>
                                    <select name="unit" id="unit" class="form-control">
                                        @foreach ($unit as $r)
                                            <option value="{{ $r->id_unit }}"
                                                {{ $r->id_unit == $row->id_unit ? 'selected' : '' }}>
                                                {{ $r->nama_unit }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" name="harga_jual" value="{{ $row->harga_jual }}" class="form-control"
                                        id="harga_jual" placeholder="Harga Jual" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="text" name="harga_beli" class="form-control" value="{{ $row->harga_beli }}"
                                        id="harga_beli" placeholder="Harga Beli " required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ route('product') }}" class="btn btn-default"><i class="fas fa-sign-out-alt"></i>
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
