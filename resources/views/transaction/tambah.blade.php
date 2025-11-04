@extends('layouts.app')
@section('content')
<section class="tambah-mobile">
    <div class="form-tambah">
        <h2>Tambah Transaksi</h2>
        <form  action="{{ route('createTransaction.post') }}" method="POST" >
            @csrf
            <div class="masukan-data">
                <label for="jenis">Jenis Transaksi</label>
                <select name="type" id="jenis-mobile">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>

                <label for="kategori-mobile">Kategori</label>
                <select name="kategori" id="kategori-mobile">
                    
                </select>

                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="amount" placeholder="Masukkan Jumlah">

                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="date">

                <button type="submit" class="btn-submit">Tambah</button>
            </div>
        </form>
    </div>
</section>
@endsection