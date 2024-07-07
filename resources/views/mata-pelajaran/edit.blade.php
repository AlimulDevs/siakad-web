@extends('template.index')

@section('content')

<style>
    #bulan-filter {
        max-width: 200px;
    }
</style>

<div class="container mt-5">

    @if ($messege = Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_add'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('failed_add'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_edit'))
    <div class="alert alert-warning alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title text-white">Ubah Data Mata Pelajaran</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/mata-pelajaran/edit">
            @csrf
            @foreach ($data_mata_pelajaran as $dtmp)
            <input type="hidden" name="id" value="{{$dtmp->id}}">


            <div class="card-body">

                <div class="form-group">
                    <label for="mata_pelajaran">Nama Mata Pelajaran</label>
                    <input value="{{$dtmp->mata_pelajaran}}" type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" placeholder="Masukkan name">
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-control">
                        <option value="{{$dtmp->jurusan_id}}">-- {{$dtmp->jurusan->name}} --</option>
                        @foreach ($data_jurusan as $dtj )
                        <option value="{{$dtj->id}}">-- {{$dtj->name}} --</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kkm">KKM</label>
                    <input value="{{$dtmp->kkm}}" type="number" class="form-control" name="kkm" id="kkm" placeholder="Masukkan kkm">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning text-white">Ubah Data</button>
            </div>
            @endforeach
        </form>
    </div>

</div>
<script>
    var bulanArray = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    const getSelectBulan = document.getElementById("bulan")
    bulanArray.map((data) => {
        getSelectBulan.innerHTML += `<option value="${data}">${data}</option>`
    })
</script>


</div>
@endsection