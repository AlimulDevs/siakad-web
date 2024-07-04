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

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Jadwal</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/jadwal/create">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="name">Nama Guru</label>
                    <select name="guru_id" id="guru_id" class="form-control">
                        <option value="">-- Pilih Guru --</option>
                        @foreach ($data_guru as $dtg )

                        <option value="{{ $dtg->id }}">{{ $dtg->user->name }}</option>

                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nama Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($data_kelas as $dtk )

                        <option value="{{ $dtk->id }}">{{ $dtk->nama }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nama Mata Pelajaran</label>
                    <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach ($data_mata_pelajaran as $dtmp )

                        <option value="{{ $dtmp->id }}">{{ $dtmp->mata_pelajaran }}</option>

                        @endforeach
                    </select>
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
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