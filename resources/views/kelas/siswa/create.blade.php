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
        <form method="POST" action="/siswa/create">
            @csrf
            <input type="hidden" value="{{$kelas_id}}" name="kelas_id" id="">
            <div class="card-body">
                <input type="hidden" name="role" value="siswa">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan name">
                </div>
                <div class="form-group">
                    <label for="jurusan_id">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-control">
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($data_jurusan as $dtj)
                        <option value="{{$dtj->id}}">--{{$dtj->name}} --</option>
                        @endforeach



                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="email" placeholder="Masukkan Password">
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