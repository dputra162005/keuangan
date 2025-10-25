<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class FrofilController extends Controller
{
    


    public function profil() {
        $user = User::with(['image','blog'])->findOrFail(Auth::id());
        //return $user->image;
        return view('profil.profill', [
            'user' => $user
        ]);
    }

    public function editProfil(Request $request) {
        $id = Auth::id();
        User::where('id', $id)->update([
            'name' => $request->name
        ]);


        $user = Auth::user();

        if ($user->blog) {
            $user->blog()->update([
                'nameblog' => $request->nameblog
            ]);
        } else {
            $user->blog()->create([
                'nameblog' => $request->nameblog
            ]);
        }

        $request->validate(
            [
                'url' => 'required|image|mimes:jpg,jpeg,png|max:5028'
            ],
            [
                'url.required' => 'wajib di isi',
                'url.image' => 'file harus berformat gambar',
                'url.mimes' => 'gambar harus berformat jpg jpeg png',
                'url.max' => 'gambar harus size 5mb'
            ]
        );

        if ($request->hasFile('url')) {

            // hapus foto lama
            if($user->image && Storage::disk('public')->exists($user->image->url)) {
                Storage::disk('public')->delete($user->image->url);
                $user->image->delete();
            }

            //upload file foto baru
            $path = $request->file('url')->store('profil','public');

            $user->image()->create([
                'url' => $path
            ]);
        };


        return Redirect()->back()->with('success', 'profil anda berhasil di perbarui');
    }

}
