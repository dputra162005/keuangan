@extends('layouts.app')

@section('content')
<section class="detail-mobile">
        <div class="detail-box">
            <h2>Detail Transaksi</h2>
            <div class="detail-content">
                <p><strong>Jenis Transaksi:</strong> {{$transaction->type}}</p>
                <p><strong>Kategori:</strong> {{$transaction->kategori}}</p>
                <p><strong>Jumlah:</strong> RP. {{$transaction->amount}}</p>
                <p><strong>Tanggal:</strong> {{$transaction->date}}</p>
            </div>
            <a href="{{ url('/transaction') }}" class="btn-back">Kembali</a>
        </div>
    </section>
@endsection