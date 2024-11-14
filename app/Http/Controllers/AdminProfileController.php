<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view("admin.profile.index");
    }
    public function edit()
    {
        return view('admin.profile.edit', [
            'user' => Auth::user()
        ]);
    }
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Check jika tidak ada perubahan data
        $isChanged = false;

        // Cek setiap field untuk perubahan
        if (
            $user->name !== $request->input('name') ||
            $user->email !== $request->input('email') ||
            $user->first_name !== $request->input('first_name') ||
            $user->last_name !== $request->input('last_name') ||
            $user->phone !== $request->input('phone') ||
            $user->location !== $request->input('location')
        ) {
            $isChanged = true;
        }

        if ($request->filled('password') && !Hash::check($request->input('password'), $user->password)) {
            $isChanged = true;
        }

        if ($request->hasFile('img')) {
            $isChanged = true;
        }

        // Jika tidak ada perubahan, kirim respons ke frontend
        if (!$isChanged) {
            return redirect('/admin/profile/edit')->with('info', 'Tidak ada perubahan yang diubah.');
        }

        // Lakukan penyimpanan jika ada perubahan
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $user->img = 'img/' . $filename;
        } else {
            // Jika tidak ada file baru diupload dan user sudah memiliki gambar, pertahankan gambar yang ada
        }

        $user->save();

        return redirect('/admin/profile')->with('success', 'Profile Berhasil di Ubah.');

    }


}

