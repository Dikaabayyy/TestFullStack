@extends('app')

@section('title', 'Data Penghuni')

@section('content')

    <div class="pagetitle">
        <h1>Ubah Data Pembayaran</h1>
    </div>

    <section class="house-data">

        <div class="card card-add">
            <div class="card-body">

                <form action="/update-payments-data-{{ $payments->slug }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-controls">
                        <label for="slug" class="form-label">Nama Penghuni</label><span> : </span>
                        <select class="form-select" name="slug" id="slug">
                            <option selected>{{ $payments->resident->name }}</option>
                            @foreach ($residents as $r)
                                <option value="{{ $r->slug }}">{{ $r->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="security_term" class="form-label">Iuran Satpam</label><span> : </span>
                        <select class="form-select" name="security_term" id="security_term">
                            <option selected>{{ $payments->security_term }}</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>

                    <div class="form-controls" id="security_time_wrapper">
                        <label for="security_time" class="form-label">Pembayaran Iuran Satpam</label><span> : </span>
                        <select class="form-select" name="security_time" id="security_time">
                            <option selected value="{{ $payments->security_time }}">{{ $payments->security_time }}</option>
                            <option value="Bulanan">Bulanan</option>
                            <option value="Tahunan">Tahunan</option>
                        </select>
                    </div>

                    <div class="form-controls">
                        <label for="cleaning_term" class="form-label">Iuran Kebersihan</label><span> : </span>
                        <select class="form-select" name="cleaning_term" id="cleaning_term">
                            <option selected>{{ $payments->cleaning_term }}</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>

                    <div class="form-controls" id="cleaning_time_wrapper">
                        <label for="cleaning_time" class="form-label">Pembayaran Iuran Kebersihan</label><span> : </span>
                        <select class="form-select" name="cleaning_time" id="cleaning_time">
                            <option selected value="{{ $payments->cleaning_time }}">{{ $payments->cleaning_time }}</option>
                            <option value="Bulanan">Bulanan</option>
                            <option value="Tahunan">Tahunan</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right: 10px">Update Data Pembayaran</button>
                </form>
                    <a type="button" href="/house-data" class="btn btn-secondary">Kembali</a>
                </div>
        </div>

    </section>
@endsection
