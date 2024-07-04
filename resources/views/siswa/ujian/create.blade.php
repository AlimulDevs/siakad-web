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
            <h3 class="card-title">Tambah Data Siswa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/siswa/ujian/create">
            @csrf
            <div class="card-body">
                <input type="hidden" name="siswa_id" value="{{$siswa_id}}">

                <div class="form-group">
                    <label for="mata_pelajaran_id">Mata Pelajaran</label>
                    <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach ($data_mata_pelajaran as $dtmp)
                        <option value="{{$dtmp->id}}">--{{$dtmp->mata_pelajaran}} --</option>
                        @endforeach



                    </select>
                </div>

                <div class="form-group">
                    <label for="nilai_tugas">Nilai Tugas</label>
                    <input type="number" class="form-control" name="nilai_tugas" id="nilai_tugas" placeholder="Masukkan Nilai Tugas">
                </div>
                <div class="form-group">
                    <label for="nilai_uts">Nilai UTS</label>
                    <input type="number" class="form-control" name="nilai_uts" id="nilai_uts" placeholder="Masukkan Nilai Tugas">
                </div>
                <div class="form-group">
                    <label for="nilai_uas">Nilai UAS</label>
                    <input type="number" class="form-control" name="nilai_uas" id="nilai_uas" placeholder="Masukkan Nilai Tugas">
                </div>
                <div class="form-group">
                    <label for="nilai_akhir">Nilai Akhir</label>
                    <input type="number" class="form-control" name="nilai_akhir" id="nilai_akhir" placeholder="Masukkan Nilai Tugas">
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>

</div>



</div>
@endsection