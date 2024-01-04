<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Str;
use App\Mail\AuthMail;

class UserControlController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if(strlen($katakunci)) {
            $uc = User::where('email', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        }else {
            $uc = User::orderBy('email', 'asc')->Paginate($jumlahbaris);
        }
        $uc = User::all();
        return view('user.user')->with('uc', $uc);
    }

    // public function create()
    // {
    //     return view('user.create');
    // }

    // public function store(Request $request)
    // {
    //     $str = Str::random(100);

    //     $request->validate([
    //         'name' => 'required|min:4',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6',
    //     ], [
    //         'name.required' => 'Full Name Wajib Di isi',
    //         'name.min' => 'Bidang Full Name minimal harus 4 karakter.',
    //         'email.required' => 'Email Wajib Di isi',
    //         'email.email' => 'Format Email Invalid',
    //         'email.unique' => 'Email sudah digunakan',
    //         'password.required' => 'Password Wajib Di isi',
    //         'password.min' => 'Password minimal harus 6 karakter.',
    //     ]);

    //     if ($request->hasFile('gambar')) {
    //         $gambar_file = $request->file('gambar');
    //         $nama_foto = date('ymdhis') . "." . $gambar_file->getClientOriginalExtension();
    //         $gambar_file->move(public_path('picture/accounts'), $nama_foto);
    //         $gambar = $nama_foto;
    //     } else {
    //         $gambar = "user.jpeg";
    //     }

    //     $accounts = User::create([
    //         'name' => $request->fullname,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'verify_key' => $str,
    //     ]);

    //     $details = [
    //         'nama' => $accounts->fullname,
    //         'role' => 'user',
    //         'datetime' => now()->format('Y-m-d H:i:s'),
    //         'website' => 'Laravel10 - Pendaftaran melalui SMTP + Multiuser + CRUD + Sweetalert',
    //         'url' => 'http://' . request()->getHttpHost() . "/" . "verify/" . $accounts->verify_key,
    //     ];

    //     Mail::to($request->email)->send(new AuthMail($details));

    //     Session::flash('success', 'User berhasil ditambahkan, Harap verifikasi akun sebelum digunakan.');

    //     return redirect('/usercontrol');
    // }

    // public function edit($id)
    // {
    //     $data = User::findOrFail('email', $id)->first();
    //     return view('user.edit', ['uc' => $data]);
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'gambar' => 'image|file|max:1024',
    //         'fullname' => 'required|min:4',
    //     ], [
    //         'gambar.image' => 'File Wajib Image',
    //         'gambar.file' => 'Wajib File',
    //         'gambar.max' => 'Bidang gambar tidak boleh lebih besar dari 1024 kilobyte',
    //         'fullname.required' => 'Nama Wajib Di isi',
    //         'fullname.min' => 'Bidang nama minimal harus 4 karakter.',
    //     ]);

    //     $user = User::findOrFail($request->id);

    //     $user->fullname = $request->fullname;
    //     if ($request->password) {
    //         $user->password = bcrypt($request->password);
    //     }
    //     $user->save();

    //     Session::flash('success', 'User berhasil diedit');

    //     return redirect('/usercontrol');
    // }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/usercontrol');
    }
}