@extends('layouts.app')

@section('content')
@include('modal.modal_tambah')
<section class="hero-destop">
        <div class="gird">
            <div class="box">
                <h3>pemasukan</h3>
                <h1>RP {{number_format($total_pemasukan,0,',','.')}}</h1>
            </div>
            <div class="box">
                <h3>pengeluaran</h3>
                <h1>RP {{number_format($total_pengeluaran,0,',','.')}}</h1>
            </div>
            <div class="box">
                <h3>sisa saldo</h3>
                <h1>RP {{number_format($total,0,',','.')}}</h1>
            </div>
        </div>
    </section>

<section class="desktop">
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Kategori</th>
          <th>Type</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $transactions  as $transaction )
        <tr>
            <td>{{ ( $transactions->currentpage()-1) *  $transactions->perpage() + $loop->index + 1 }}</td>
          <td>{{$transaction->kategori}}</td>
          <td>{{$transaction->type}}</td>
          <td>RP {{number_format($transaction->amount,0,',','.')}}</td>
          <td class="aksi">
            <a class="btn edit" ><i class="fa-solid fa-pen-to-square"></i></a>
            <a class="btn hapus" ><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{-- pagination link --}}
    <table>
  <!-- ... tabel transaksi ... -->
</table>

<div class="pagination-custom">
    {{-- Previous Page Link --}}
    @if ($transactions->onFirstPage())
        <span class="disabled">Prev</span>
    @else
        <a href="{{ $transactions->previousPageUrl() }}">Prev</a>
    @endif

    {{-- Nomor Halaman --}}
    @for ($i = 1; $i <= $transactions->lastPage(); $i++)
        @if ($i == $transactions->currentPage())
            <span class="active">{{ $i }}</span>
        @else
            <a href="{{ $transactions->url($i) }}">{{ $i }}</a>
        @endif
    @endfor

    {{-- Next Page Link --}}
    @if ($transactions->hasMorePages())
        <a href="{{ $transactions->nextPageUrl() }}">Next</a>
    @else
        <span class="disabled">Next</span>
    @endif
</div>

</section>



<section class="mobile">
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Type</th>
          <th>jumlah</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $transactions  as $transaction )
        <tr>
          <td>{{ ( $transactions->currentpage()-1) *  $transactions->perpage() + $loop->index + 1 }}</td>
          <td>{{$transaction->kategori}}</td>
          <td>{{$transaction->type}}</td>
          <td class="aksi">
            <a class="btn" href="{{ url('/transaction/detail/'.$transaction->id) }}"><i class="fa-solid fa-circle-info"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection