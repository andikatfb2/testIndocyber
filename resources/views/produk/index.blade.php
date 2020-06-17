@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
                <div class="card-body">
                 <a href="{{ route('produk.create') }}"><button type="button" class="btn btn-primary">  {{ __('Tambah Produk') }} </button> </a>
                </div>

                    
<div class="container">
  <div class="row">
   @foreach($data as $data)
    <div class="col-md-4">
      <div class="card-body">        
          <img src="{{asset('./image/'.$data->image)}}" alt="Lights" style="width:100%">
          <div class="caption">
          <p>
            <b class="text-dark">{{$data->nama_produk}}</b><br>
            <h3 class="text-danger">Rp.{{ number_format($data->harga) }}</h3>
            <b class="text-dark">Stok Tersedia : {{$data->stok}}</b>
          </p>
          </div>
          <form action="{{ route('produk.destroy', $data->id)}}" method="post" onSubmit="return confirmBerofeDelete()">
                  @csrf
                  @method('DELETE')
                  <a href="{{ route('produk.show',$data->id)}}"   class="btn btn-primary"> {{ __('Lihat') }}</a>
                  <a href="{{ route('produk.edit',$data->id)}}"   class="btn btn-warning"> {{ __('Edit') }}</a>
                  <button class="btn btn-danger" type="submit">{{ __('Hapus') }}</button>
            </form>
      </div>
    </div>
    @endforeach
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
