@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                    
<div class="container">
  <div class="row">
    <div class="col-md-10">
        <div class="card-body">        
            <img src="{{asset('./image/'.$produk->image)}}" alt="Lights" style="width:100%">
        </div>

        <div class="caption">
        <p>
            <b class="text-dark">{{$produk->nama_produk}}</b><br>
            <h3 class="text-danger">Rp.{{ number_format($produk->harga) }}</h3>
            <b class="text-dark">Stok Tersedia : {{$produk->stok}}</b>
        </p>
        </div> 

        <center><a href="{{ route('produk.index')}}"   class="btn btn-danger"> {{ __('Kembali') }}</a></center>
      </div>
  </div>
</div>     
</div>

<script type="application/javascript">
 
 function confirmBerofeDelete(){
    var r = confirm("Apakah anda yakin?");
    if (r == true) {
        return true;
    } else {
        return false;
    }
    
 }
</script>
@endsection
