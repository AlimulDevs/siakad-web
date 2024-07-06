@extends('template.index')

@section('content')

<style>
    .main-image {
        width: 100%;
        height: 300px;
    }

    .my-container {
        margin-top: 20px;
        height: 330px;
        display: flex;
        overflow: hidden;
    }

    .my_carousel {

        display: flex;

        height: 330px;
        align-items: center;
        padding-left: 30px;
        transition: all 0.5s ease-in;
        gap: 100px;
    }

    .my-card {
        background-color: white;
        box-shadow: 1px 1px 10px 1px;
        border-radius: 12px;
        width: 250px;
        min-height: 300px;

    }

    .action-btn {
        margin-top: 50px;
        display: flex;
        width: 100%;
        justify-content: center;
        gap: 10px;
        padding-bottom: 30px;
    }

    .action-btn button {
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 12px;
        border: 1px solid white;
        color: white;

    }

    .action-btn button:nth-child(1) {
        background-color: red;
    }

    .action-btn button:nth-child(2) {
        background-color: green;
    }

    .my-card .header img {
        width: 100%;
        height: 150px;
    }

    .my-card .body {
        padding-left: 10px;
        margin-top: 10px;
        padding-right: 10px;
    }

    .my-card .body .title {
        font-size: 15px;
        color: yellowgreen;
    }

    .my-card .body .content a {
        color: black;

    }
</style>


<div class="container mt-5">



    <div class="row justify-content-center ">
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/guru/index" class="text-dark">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-chalkboard-teacher"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Guru</span>
                        <span class="info-box-number">{{$jumlah_guru}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/jurusan/index" class="text-dark">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-briefcase"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Jurusan</span>
                        <span class="info-box-number">{{$jumlah_jurusan}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/kelas/index" class="text-dark">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-chalkboard"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Kelas</span>
                        <span class="info-box-number">{{$jumlah_kelas}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/mata-pelajaran/index" class="text-dark">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Mata Pelajaran</span>
                        <span class="info-box-number">{{$jumlah_mata_pelajaran}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/jadwal/index" class="text-dark">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-clock"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Jadwal</span>
                        <span class="info-box-number">{{$jumlah_jadwal}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="/siswa/index" class="text-dark">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Siswa</span>
                        <span class="info-box-number">{{$jumlah_siswa}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>




    </div>

    <!-- /.card-body -->
</div>

</div>
<script>
    const getCarousel = document.getElementById("my_carousel");
    const lastIndex = getCarousel.children.length - 1

    let index = 2



    let translete = 0;

    function prefBtn() {
        if (index > 2) {
            index--
            translete += 330
        } else {

            translete -= (330 * (lastIndex - index))
            index = lastIndex;
        }

        getCarousel.style.transform = `translateX(${translete}px)`;
    }

    function nextBtn() {
        if (index < lastIndex) {
            index++
            translete -= 330
        } else {
            index = 2;
            translete = 0
        }

        getCarousel.style.transform = `translateX(${translete}px)`;
    }
</script>
</div>
@endsection