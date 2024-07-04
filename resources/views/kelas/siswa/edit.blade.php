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
            <h3 class="card-title text-white">Ubah Data Siswa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/siswa/edit">
            @csrf
            @foreach ($data_siswa as $dtg)
            <input type="hidden" name="id" value="{{$dtg->id}}">
            <input type="hidden" name="user_id" value="{{$dtg->user_id}}">

            <div class="card-body">

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input value="{{$dtg->user->name}}" type="text" class="form-control" name="name" id="name" placeholder="Masukkan name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{$dtg->user->email}}" type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                </div>

                <div class="form-group">
                    <label for="jurusan_id">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-control">
                        <option value="{{$dtg->jurusan_id}}">-- {{$dtg->jurusan->name}} --</option>
                        @foreach ($data_jurusan as $dtj)
                        <option value="{{$dtj->id}}">--{{$dtj->name}} --</option>
                        @endforeach



                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control">
                        <option value="{{$dtg->kelas_id}}">-- {{$dtg->kelas->nama}} --</option>
                        @foreach ($data_kelas as $dtk)
                        <option value="{{$dtk->id}}">-- {{$dtk->nama}} --</option>
                        @endforeach



                    </select>
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