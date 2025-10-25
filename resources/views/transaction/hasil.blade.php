@extends('layouts.app')
@section('content')

<section class="hero-mobile">
    <div class="gird">
        <div class="box">
            <h3>pemasukan</h3>
            <h1 >RP. {{number_format($total_pemasukan,0,',','.')}}</h1>
        </div>
        <div class="box">
            <h3>pengeluaran</h3>
            <h1 style="color: red" >RP. {{number_format($total_pengeluaran,0,',','.')}}</h1>
        </div>
        <div class="box">
            <h3>sisa saldo</h3>
            <h1>RP. {{number_format($total,0,',','.')}}</h1>
        </div>
    </div>
</section>
@endsection