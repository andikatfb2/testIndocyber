@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Soal Logika Nomor 1</div>

                <div class="card-body">
                    @foreach ($data as $value)
                    <?php echo $value?>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
