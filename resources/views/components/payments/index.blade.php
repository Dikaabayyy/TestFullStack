@extends('app')

@section('title', 'Data Pembayaran')

@section('content')

    <div class="pagetitle">
        <h1>Data Pembayaran</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" style="margin: 0 15px 20px 15px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="detail-payment">
        <div class="card">
            <div class="card-body">
                <table class="table" style="width: 30%">
                    <thead>
                        <tr>
                            <th class="number" style="width: 3%">#</th>
                            <th style="width: 10%">Nama Iuran</th>
                            <th  style="width: 8%">Harga</th>
                            <th  style="width: 5%">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>


                    @foreach ($paymentDetail as $item => $pD)
                        <tr>
                            <th>{{ $item + 1 }}</th>
                            <td>{{ $pD ->name }}</td>
                            <td>Rp. {{ $pD ->payment_price }}</td>
                            <td>{{ $pD ->payment_term }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <section class="house-data">
        <table class="table" style="width: 100%">
            <thead>
                <tr>
                <th class="number" style="width: 3%">#</th>
                <th>Nama</th>
                <th style="width: 10%">Rumah</th>
                <th style="width: 10%">Status Penghuni</th>
                <th style="width: 10%">Iuran Satpam</th>
                <th style="width: 13%">Jangka Iuran Satpam</th>
                <th style="width: 10%">Iuran Kebersihan</th>
                <th style="width: 13%">Jangka Iuran Kebersihan</th>
                <th class="number" style="width: 15%">Opsi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($histories as $h)

                <div class="modal fade" id="delpaymentsModal-{{ $h->slug }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="delpaymentsModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delpaymentsModalLabel">Perhatian!!!</h1>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus Data Pembayaran {{ $h->resident->name }} ?
                            </div>
                            <div class="modal-footer">
                                <form action="/delete-payments-{{ $h->slug }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Ya</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </div>

                <tr>
                    <th class="number">{{ $loop->iteration }}</th>
                    <td>{{ $h->resident->name }}</td>
                    <td>{{ $h->house->name }}</td>
                    <td>{{ $h->resident->resident_status }}</td>
                    <td>Rp. {{ $h->security_price }}</td>
                    <td><b> {{ $h->security_term }} </b> / {{ $h->security_time }}</td>
                    <td>Rp. {{ $h->cleaning_price }}</td>
                    <td><b> {{ $h->cleaning_term }} </b> / {{ $h->cleaning_time }}</td>
                    <td>
                        <div class="option-button">
                            <a type="buton" href="/edit-payments-data-{{ $h->slug }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah</a><br>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delpaymentsModal-{{ $h->slug }}"><i class="bi bi-trash"></i> Hapus</button>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </section>
@endsection
