@extends('app')

@section('title', 'Data Rumah')

@section('content')

    <div class="pagetitle">
        <h1>Ubah Data Rumah</h1>
    </div>

    <section class="house-data">

        <div class="card card-add">
            <div class="card-body">

                <form action="/update-house-data-{{ $house->slug }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-controls">
                        <label for="name" class="form-label">Nama Rumah</label><span> : </span>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $house->name }}" required>
                    </div>

                    <div class="form-controls">
                        <label for="address" class="form-label">Alamat Rumah</label><span> : </span>
                        <textarea name="address" id="address" class="form-control" rows="3" style="resize: none" required>{{ $house->address }}</textarea>
                    </div>

                    <div class="form-controls">
                        <label for="resident_status" class="form-label">Status Rumah</label><span> : </span>
                        <select class="form-select" name="resident_status" id="resident_status">
                            <option selected>{{ $house->resident_status }}</option>
                            <option value="Berpenghuni">Berpenghuni</option>
                            <option value="Tidak Berpenghuni">Tidak Berpenghuni</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="payment_term" class="form-label">Status Pembayaran</label><span> : </span>
                        <select class="form-select" name="payment_term" id="payment_term">
                            <option selected>{{ $house->payment_term }}</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="name_resident" class="form-label">Penghuni Rumah</label><span> : </span>
                        <input type="text" class="form-control" value="{{ $house->resident_name }}" disabled>
                    </div>

                    <div class="form-controls">
                        <label for="resident_history" class="form-label">Penghuni Rumah Sebelumnya</label><span> : </span>
                        <textarea name="resident_history" id="resident_history" class="form-control" rows="3" style="resize: none">{{ $house->resident_history }}</textarea>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right: 10px">Update Data Rumah</button>
                </form>
                    <a type="button" href="/house-data" class="btn btn-secondary">Kembali</a>
                </div>
        </div>

    </section>
@endsection
