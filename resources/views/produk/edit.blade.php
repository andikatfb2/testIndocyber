@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Tambah Produk</div>

                <div class="card-body">
                <form action="{{ route('produk.update', $produk->id) }}" method="post" enctype="multipart/form-data" onSubmit="return validation()">
                 @csrf
                  @method('PUT')
                    <div class="form-group row">
                        <label for="nama_produk" class="col-md-4 col-form-label text-md-right">{{ __('Nama Produk') }}</label>
                        <div class="col-md-6">
                            <input id="nama_produk" type="text" class="form-control @error('numeric') is-invalid @enderror" name="nama_produk" value="{{ $produk->nama_produk }}" required autocomplete="nama_produk" autofocus maxlength="191" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                        <div class="col-md-6">
                            <input id="harga" type="number" class="form-control @error('numeric') is-invalid @enderror" name="harga" value="{{ $produk->harga }}" required>

                            @error('numeric')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-md-4 col-form-label text-md-right">{{ __('Stok') }}</label>

                        <div class="col-md-6">
                            <input id="stok" type="number" class="form-control @error('numberic') is-invalid @enderror" name="stok" value="{{ $produk->stok }}" required>

                            @error('numeric')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Gambar Prooduk') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control @error('file') is-invalid @enderror" name="image"  enctype="multipart/form-data">

                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        

                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Simpan') }}
                                </button>
                                <a href="{{ route('produk.index') }}"><button type="button" class="btn btn-danger">  {{ __('Kembali') }} </button> </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="application/javascript">
 
 function validation(){
    var stok = document.getElementById("stok").value;
    var harga = document.getElementById("harga").value;
    var image = document.getElementById("image").value;
    
    if(harga < 0) {
        alert('Harga tidak kurang dari 0');
        return false;
    }

    if(stok < 0) {
        alert('Stok tidak kurang dari 0');
        return false;
    }

    if(image == null) {
        alert('Silahkan pilih gambar yang ingin anda tampilkan');
        return false;
    }
 }
</script>
@endsection
