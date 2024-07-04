@extends('template.index')

@section('content')



<div class="container">
    <h3 class="text-center text-secondary">DATA LANSIA</h3>

    <style>
        .row {
            display: flex;
            width: 100%;
            justify-content: flex-start;
            gap: 30px;
        }

        .bingkai {
            width: 300px;
            height: 300px;
            border: 1px solid black;
            border-radius: 12px;
            display: flex;
            padding: 0;
            overflow: hidden;
            align-items: center;
            justify-content: center;
        }

        .bingkai #my-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            padding: 0;
        }

        .data {
            width: 600px;

        }
    </style>
    <div class="card">
        <div class="card-header">
            <h1 class="text-center fw-bold">PROFILE</h1>

        </div>
        <form id="form-update-photo" action="/update-photo-profile" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="foto_profile_input" class="d-none" id="foto_profile_input">
        </form>
        <div class="card-body">
            <div class="row">
                <label for="foto_profile_input" class="bingkai">
                    <img src="{{$data->user->photo_profile_url}}" alt="image profile" id="my-image">

                </label>

                <script>
                    // Tangani peristiwa saat gambar dipilih
                    document.getElementById('foto_profile_input').addEventListener('change', function(event) {
                        const getForm = document.getElementById('form-update-photo');
                        console.log(getForm.id)

                        getForm.submit();
                    });
                </script>
                <div class="data">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <th>{{$data->user->name}}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <th>{{$data->user->email}}</th>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <th>:</th>
                                <th>{{$data->nik}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>





</div>
@endsection