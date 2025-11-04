<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index() {
        // $user = User::with('transaction')->find(5);
        $user = Auth::user();

        $user_img = User::with(['image','blog'])->findOrFail($user->id);
        
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
            'transactions' => $transactions,
            'user_img' => $user_img
        ]);
    }

    public function showDetail($id) {
        

        $transaction = Transaction::find($id);
        return view('transaction.detail', [
            'transaction' => $transaction
        ]);
    }

    public function showHasil() {
        $user = Auth::user();
    
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
            ,'total' => $total,
            
        ]);

        
    }

    public function create() {
        return view('transaction.tambah');
    }



    //membuat post untuk masukan ke database
    public function createTransaction(Request $request) {
        //return $request;
        $request->validate([
            'amount' => 'numeric',
            'type' => 'required',
            'date' => 'required',
            'kategori' => 'required'
        ],[
            'amount.numeric' => 'input amount no string',
            'amount.required' => 'wajib di isi semuanya',
            'type.required' => 'wajib di isi semuanya',
            'date.required' => 'wajib di isi semuanya',
            'kategori.required' => 'wajib di isi semuanya',
        ]);



        $user = Auth::user();
        
        //return $user;
        $pemasukan = $user->transaction()
            ->where('type', 'pemasukan')
            ->get();
        $pengeluaran = $user->transaction()
            ->where('type', 'pengeluaran')
            ->get();
        $total_pemasukan = $pemasukan->sum('amount');
        $total_pengeluaran = $pengeluaran->sum('amount');
        $total = $total_pemasukan - $total_pengeluaran;

        if ($request->type == 'pengeluaran' && $request->amount > $total) {
            return back()->withErrors("pengeluaran mu melebihi dari sisa saldo mu!!!");
        }

        Transaction::where('user_id', $user)->create([
        'user_id' => $user->id,
        'date' => $request->date,
        'type' => $request->type,
        'amount' => $request->amount,
        'kategori' => $request->kategori
        ]);

        return redirect()->route('transaction')->with('success', 'taransaction sudah di tambahkan');  
    }

    public function deleteTransaction($id) {
        $transaction = Transaction::find($id);
        if(!$transaction) {
            return back()->withErrors("data tidak di temukan"); 
        }
        if(Auth::id() !== $transaction->user_id) {
            return back()->withErrors("anda tidak memiliki hak untuk menghapus ini");
        }

        $transaction->delete();
        return back()->with('success',"berhasil di hapus");
    }

    public function showTransaction($id) {
        $transaction = Transaction::find($id);
        return response()->json($transaction);
    }

    public function updateTransaction( Request $request, $id) {
        $transaction = Transaction::find($id);

        $validate =  $request->validate([
            'amount' => 'numeric',
            'type' => 'required',
            'date' => 'required',
            'kategori' => 'required'
        ],[
            'amount.numeric' => 'input amount no string',
            'amount.required' => 'wajib di isi semuanya',
            'type.required' => 'wajib di isi semuanya',
            'date.required' => 'wajib di isi semuanya',
            'kategori.required' => 'wajib di isi semuanya',
        ]);

        $transaction->update($validate);
        return redirect()->back()->with('success', 'taransaction sudah di perbarui');
    }


    
}
