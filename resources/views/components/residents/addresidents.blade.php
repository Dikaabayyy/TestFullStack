@extends('app')

@section('title', 'Data Penghuni')

@section('content')

    <div class="pagetitle">
        <h1>Tambah Data Penghuni</h1>
    </div>

    <section class="house-data">

        <div class="card card-add">
            <div class="card-body">

                <form action="/create-residents-data" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-controls">
                        <label for="name" class="form-label">Nama Penghuni</label><span> : </span>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-controls">
                        <label for="phone" class="form-label">No. Hp</label><span> : </span>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="form-controls">
                        <label for="gender" class="form-label">Gender Penghuni</label><span> : </span>
                        <select class="form-select" name="gender" id="gender">
                            <option selected> - </option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="resident_status" class="form-label">Status Penghuni</label><span> : </span>
                        <select class="form-select" name="resident_status" id="resident_status">
                            <option selected> - </option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="married" class="form-label">Status Pernikahan</label><span> : </span>
                        <select class="form-select" name="married" id="married">
                            <option selected> - </option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="resident_house" class="form-label">Rumah Penghuni</label><span> : </span>
                        <select class="form-select" name="resident_house" id="resident_house">
                            <option selected> - </option>
                            @foreach ($houses as $h)
                                <option value="{{ $h->slug }}">{{ $h->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan Data Penghuni</button>
                </div>
            </form>
        </div>

    </section>
@endsection
