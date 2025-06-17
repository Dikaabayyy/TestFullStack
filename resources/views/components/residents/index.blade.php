@extends('app')

@section('title', 'Data Penghuni')

@section('content')

    <div class="pagetitle">
        <h1>Data Penghuni</h1>
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
                    <th class="number" style="width: 3%">#</th>
                    <th style="width: 20%">Nama</th>
                    <th  style="width: 5%">Gender</th>
                    <th  style="width: 10%">No. HP</th>
                    <th  style="width: 12%">Foto KTP</th>
                    <th  style="width: 10%">Status Pernikahan</th>
                    <th  style="width: 10%">Status Penghuni</th>
                    <th  style="width: 12%" class="number">Opsi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($resident as $index => $r)

                <div class="modal fade" id="delresidentModal-{{ $r->slug }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="delresidentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delresidentModalLabel">Perhatian!!!</h1>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus Data Penghuni {{ $r->name }} ?
                            </div>
                            <div class="modal-footer">
                                <form action="/delete-resident-{{ $r->slug }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Ya</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </div>

                <tr>
                    <th class="number">{{ $index + 1 }}</th>
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->gender }}</td>
                    <td>{{ $r->phone }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$r->img_name) }}" alt="" class="img-tcr">
                    </td>
                    <td>{{ $r->married }}</td>
                    <td>{{ $r->resident_status }}</td>
                    <td>
                        <div class="option-button">
                            <a type="buton" href="/edit-residents-data-{{ $r->slug }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</a><br>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delresidentModal-{{ $r->slug }}"><i class="bi bi-trash"></i> Hapus</button>
                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </section>
@endsection
