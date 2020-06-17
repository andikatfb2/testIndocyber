@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Soal Logika Nomor 2</div>

                <div class="card-body">
                    <form method="" action="" > 
                    @csrf

                    <div class="form-group row">
                        <label for="nominal" class="col-md-10 col-form-label ">{{ __('Masukan jumlah uang yang ingin anda tarik') }}</label>
                        <div class="col-md-10">
                            <input id="nominal" type="text" class="form-control @error('numeric') is-invalid @enderror" name="nominal" value="{{ old('nominal') }}"  required  autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            @error('numeric')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nominal" class="col-md-10 col-form-label ">{{ __('Silahkan pilih nominal pecahan') }}</label>
                        <div class="col-md-10">
                            <input type="radio" name="pecahan" value="100000"> <label for="nominal">{{ __('Rp 100.000,-;') }}</label><br>
                            <input type="radio" name="pecahan" value="50000"> <label for="nominal">{{ __('Rp 50.000,-;') }}</label><br>
                            <input type="radio" name="pecahan" value="20000"> <label for="nominal">{{ __('Rp 20.000,-;') }}</label><br>
                            <input type="radio" name="pecahan" value="5000"> <label for="nominal">{{ __('Rp 5.000,-;') }}</label><br>
                            <input type="radio" name="pecahan" value="100"> <label for="nominal">{{ __('Rp 100,-;') }}</label><br>
                            <input type="radio" name="pecahan" value="50"> <label for="nominal">{{ __('Rp 50,-;') }}</label><br>
                        </div>
                    </div>
                        
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-primary" onClick="cekJumlahItem()">
                                {{ __('OK') }}
                            </button>

                            <button type="button" class="btn btn-danger" onClick="ulang()">
                                {{ __('Ulang') }}
                            </button>
                        </div>
                      
                    </div>

                    <div class="form-group row mb-0">
                       <span id="desc" class = "alert alert-info"></span>
                       <span id="jumlah" class = "alert alert-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">

  function cekJumlahItem(){
    var nominal = document.getElementById("nominal").value;
    var pecahan = document.querySelector('input[name="pecahan"]:checked').value;
    var jumlah  = 0;
    var res     = "";

    jumlah = nominal/pecahan;   
    res    = Number.isInteger(jumlah);
    console.log(res);
    if(res == false) {
        alert('Maaf uang pecahan yang anda pilih tidak sesuai dengan jumlah uang addan /n harap sesauikan antara jumlah uang dengan pecahan yang anda pilih');
    } else {
        if(nominal < 1 || nominal == null) {
        alert('Silahkan. masukan nominal dengan benar');

        } else if(jumlah < 1) {
            alert('Nominal harus besar dari uang pecahan');
        } else {
            document.getElementById("jumlah").style.display = 'block';
            document.getElementById("desc").style.display = 'block';

            document.getElementById("jumlah").innerHTML = jumlah;
            document.getElementById("desc").innerHTML = "Jumlah Uang Pecahan Anda dalah : ";
        }
    }
 }

 function ulang() {  
    document.getElementById("jumlah").innerHTML = "";
    document.getElementById("desc").innerHTML = "";
 }
</script>
@endsection
