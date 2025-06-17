@extends('app')

@section('title', 'Dashboard')

@section('content')

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <section class="dashboard">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-houses-fill"></i><span>Data Total Rumah</span>
            </div>
            <div class="card-body">
                {{ $houses }}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-people-fill"></i><span>Data Total Penghuni</span>
            </div>
            <div class="card-body">
                {{ $residents }}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-cash-stack"></i><span>Data Total Pembayaran</span>
            </div>
            <div class="card-body">
                {{ $payments }}
            </div>
        </div>
    </section>
@endsection
