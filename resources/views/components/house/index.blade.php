@extends('app')

@section('title', 'Data Rumah')

@section('content')

    <div class="pagetitle">
        <h1>Data Rumah</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" style="margin: 0 15px 20px 15px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="house-data">
        <table class="table" style="width: 100%">
            <thead>
                <tr>
                <th class="number" style="width: 5%;">#</th>
                <th style="width: 20%">Nama Rumah</th>
                <th style="width: 15%">Status Penghuni</th>
                <th>Alamat</th>
                <th style="width: 15%">Pembayaran</th>
                <th style="width: 15%" class="number">Opsi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($houses as $item => $h)

                <div class="modal fade" id="delhouseModal-{{ $h->slug }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="delhouseModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delhouseModalLabel">Perhatian!!!</h1>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus Data Rumah {{ $h->name }} ?
                            </div>
                            <div class="modal-footer">
                                <form action="/delete-house-{{ $h->slug }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Ya</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </div>

                <tr>
                    <th class="number">{{ $item + 1 }}</th>
                    <td>{{ $h ->name }}</td>
                    <td>{{ $h ->resident_status }}</td>
                    <td>{{ $h ->address }}</td>
                    <td>{{ $h ->payment_term }}</td>
                    <td>
                        <div class="option-button">
                            <a type="buton" href="/edit-house-data-{{ $h->slug }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</a><br>
                            <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#delhouseModal-{{ $h->slug }}"><i class="bi bi-trash"></i> Hapus</button>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </section>
@endsection
