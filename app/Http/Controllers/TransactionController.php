<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {
        $user = User::with('transaction')->find(5);

        $pemasukan = $user->transaction()
            ->where('type', 'pemasukan')
            ->get();
        $pengeluaran = $user->transaction()
            ->where('type', 'pengeluaran')
            ->get();
        $total_pemasukan = $pemasukan->sum('amount');
        $total_pengeluaran = $pengeluaran->sum('amount');
        $transactions = $user->transaction()->paginate(15);
        $total = $total_pemasukan - $total_pengeluaran;

        

        return view('transaction.index', [
            'user' => $user,
            'total_pengeluaran' => $total_pengeluaran,
            'total_pemasukan' => $total_pemasukan,
            'total' => $total,
            'transactions' => $transactions
        ]);
    }

    public function showDetail($id) {
        $transaction = Transaction::find($id);
        return view('transaction.detail', [
            'transaction' => $transaction
        ]);
    }

    public function showHasil() {
        $user = User::with('transaction')->find(5);
        $pemasukan = $user->transaction()
            ->where('type', 'pemasukan')
            ->get();
        $pengeluaran = $user->transaction()
            ->where('type', 'pengeluaran')
            ->get();
        $total_pemasukan = $pemasukan->sum('amount');
        $total_pengeluaran = $pengeluaran->sum('amount');
        $total = $total_pemasukan - $total_pengeluaran;
        return view('transaction.hasil',[
            'user' => $user
            ,'total_pengeluaran' => $total_pengeluaran
            ,'total_pemasukan' => $total_pemasukan
            ,'total' => $total
        ]);
    }

    public function create() {
        return view('transaction.tambah');
    }
}
