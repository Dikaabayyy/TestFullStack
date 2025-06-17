@extends('app')

@section('title', 'Data Penghuni')

@section('content')

    <div class="pagetitle">
        <h1>Ubah Data Penghuni</h1>
    </div>

    <section class="house-data">

        <div class="card card-add">
            <div class="card-body">

                <form action="/update-residents-data-{{ $residents->slug }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-controls">
                        <label for="name" class="form-label">Nama Penghuni</label><span> : </span>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $residents->name }}">
                    </div>

                    <div class="form-controls">
                        <label for="phone" class="form-label">No. Hp</label><span> : </span>
                        <input type="text" class="form-control" id="phone" name="phone" required value="{{ $residents->phone }}">
                    </div>

                    <div class="form-controls">
                        <label for="gender" class="form-label">Gender Penghuni</label><span> : </span>
                        <select class="form-select" name="gender" id="gender">
                            <option selected>{{ $residents->gender }}</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="form-controls mb-1">
                        <label for="img" class="form-label mt-3">Foto KTP Penghuni</label>
                    </div>

                    <div class="form-controls mb-5">
                        <img src="{{ asset('storage/'.$residents->img_name) }}" alt="" class="form-control">
                        <img id="preview" class="preview prev-ktp" src="#" alt="Pratinjau Gambar" style="display: none;">
                    </div>

                    <div class="form-controls">
                        <label for="img_ktp" class="form-label">Ganti Foto KTP Penghuni</label><span> : </span>
                        <input type="file" name="image" id="image" accept="image/*" class="form-control" onchange="previewImage(event)">
                    </div>

                    <div class="form-controls">
                        <label for="resident_status" class="form-label">Status Penghuni</label><span> : </span>
                        <select class="form-select" name="resident_status" id="resident_status">
                            <option selected>{{ $residents->resident_status }}</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="married" class="form-label">Status Pernikahan</label><span> : </span>
                        <select class="form-select" name="married" id="married">
                            <option selected>{{ $residents->married }}</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="resident_house" class="form-label">Rumah Penghuni</label><span> : </span>
                        <select class="form-select" name="resident_house" id="resident_house">
                            <option value="{{ $residents->houses->slug }}" selected>{{ $residents->houses->name }}</option>
                            @foreach ($houses as $h)
                                <option value="{{ $h->slug }}">{{ $h->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right: 10px">Ubah Data Penghuni</button>
                </form>
                    <a type="button" href="/residents-data" class="btn btn-secondary">Kembali</a>
                </div>
        </div>

    </section>
@endsection
