@extends('app')

@section('title', 'Data Rumah')

@section('content')

    <div class="pagetitle">
        <h1>Tambah Data Rumah</h1>
    </div>

    <section class="house-data">

        <div class="card card-add">
            <div class="card-body">

                <form action="/create-house-data" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-controls">
                        <label for="name" class="form-label">Nama Rumah</label><span> : </span>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-controls">
                        <label for="address" class="form-label">Alamat Rumah</label><span> : </span>
                        <textarea name="address" id="address" class="form-control" rows="3" style="resize: none" required></textarea>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan Data Rumah</button>
                </div>
            </form>
        </div>

    </section>
@endsection
